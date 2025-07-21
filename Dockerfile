FROM chialab/php:8.4-apache

RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    && rm -rf /var/lib/apt/lists/*


# Node.js و npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && a2enmod rewrite

ARG GIT_REPO_URL=https://github.com/Rayiumir/Discuss.git
RUN git clone ${GIT_REPO_URL} . \
    && composer install --no-interaction --optimize-autoloader \
    && git config --global --add safe.directory /var/www/html \
    && npm install --force \
    && npm run build \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

COPY . .

CMD ["apache2-foreground"]
