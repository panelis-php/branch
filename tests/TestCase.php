<?php

namespace Panelis\Branch\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Panelis\Activity\Providers\ActivityServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [ActivityServiceProvider::class];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite.database', ':memory:');
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadMigrationsFrom(base_path('../activity/database/migrations'));
    }
}
