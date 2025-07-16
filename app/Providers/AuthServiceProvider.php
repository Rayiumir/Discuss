<?php

namespace App\Providers;

use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected array $policies = [
        Discussion::class  => \App\Policies\DiscussionPolicy::class,
        Post::class        => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
