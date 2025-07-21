# Discuss

This project is a modern and user-friendly forum application developed using cutting-edge web technologies. The forum provides comprehensive features for creating online communities, facilitating discussions, and enabling users to exchange ideas and opinions.

# Installation

## Typical installation
```bash
git clone https://github.com/Rayiumir/Discuss.git
cd Discuss/
composer install
npm install
cp .env.example .env
php artisan migrate --seed
php artisan key:generate
php artisan serve
npm run dev
```

## Installing with Docker
```bash
mkdir discuss -p && cd discuss && \
curl  https://raw.githubusercontent.com/Rayiumir/Discuss/refs/heads/main/Dockerfile > Dockerfile && \
docker build . --tag=discuss:latest && \
curl https://raw.githubusercontent.com/Rayiumir/Discuss/refs/heads/main/.env.example > .env && mkdir storage -p && \
HASH_DOCKER=$(docker run -d -p 8019:80 -v $(pwd)/.env:/var/www/html/.env -v $(pwd)/storage:/var/www/html/storage/app discuss  | head -c 64) && \
docker exec $HASH_DOCKER  php artisan key:generate && \
docker exec $HASH_DOCKER  php artisan migrate --seed && \
docker exec $HASH_DOCKER  chmod -R 775 database/database.sqlite && \
docker exec $HASH_DOCKER  chown -R www-data:www-data database/database.sqlite
```
# Screenshots

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Dashboard</th>
      <th scope="col" width="1000px">Best Answer</th>
      <th scope="col" width="1000px">Discuss Index</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="./Screenshots/Dashboard.png" width="100%" alt="Dashboard">
      </td>
      <td>
        <img src="./Screenshots/Best Answer.png" width="100%" alt="Best Answer">
      </td>
      <td>
        <img src="./Screenshots/Discuss Index.png" width="100%" alt="Discuss Index">
      </td>
    </tr>
  </tbody>
</table>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">New Discussion</th>
      <th scope="col" width="1000px">Discuss Replying</th>
      <th scope="col" width="1000px">Discuss Single</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="./Screenshots/New Discussion.png" width="100%" alt="New Discussion">
      </td>
      <td>
        <img src="./Screenshots/Replying.png" width="100%" alt="Discuss Replying">
      </td>
      <td>
        <img src="./Screenshots/Single.png" width="100%" alt="Discuss Single">
      </td>
    </tr>
  </tbody>
</table>
