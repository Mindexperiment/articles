<?php

namespace Agpretto\Articles\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Agpretto\Articles\Tests\Fixtures\User;

abstract class IntegrationTestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [ 'Agpretto\Articles\ArticlesServiceProvider' ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        $this->withFactories(__DIR__.'/factories');
    }

    protected function getEnvironmentSetUp($app)
    {
        $config = $app->make('config');

        $config->set([
            'articles.author' => User::class,
        ]);
    }
}
