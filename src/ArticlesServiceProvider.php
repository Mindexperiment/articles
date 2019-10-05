<?php

namespace Agpretto\Articles;

use Illuminate\Support\ServiceProvider;
use Agpretto\Articles\Console\Commands\ArticlesInstall;

class ArticlesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();

        $this->commands([
            ArticlesInstall::class,
        ]);
    }

    /**
     * Bootstrap services.
     * 
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
        $this->registerMigrations();
        $this->registerPublishing();
    }

    /**
     * Setup the configuration for Articles
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/articles.php', 'articles'
        );
    }

    /**
     * Register package routes
     * 
     * @return void
     */
    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    /**
     * Register the package resources
     * 
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'articles');
    }

    /**
     * Register the package migrations
     * 
     * @return void
     */
    protected function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the package's publishable resources
     * 
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/articles.php' => $this->app->configPath('articles.php')
            ], 'articles-configs');

            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], 'articles-migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/articles'),
            ], 'articles-views');

            $this->publishes([
                __DIR__.'/../resources/css' => public_path('vendor/agpretto/articles/css'),
            ], 'articles-css');
        }
    }
}
