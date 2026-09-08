<?php

namespace Panelis\Branch\Providers;

use Illuminate\Support\ServiceProvider;

class BranchServiceProvider extends ServiceProvider
{
    private const string NAMESPACE = 'branch';

    public function boot(): void
    {
        $this->syncActivityLoggingSetting();

        $this->loadTranslationsFrom(__DIR__.'/../../lang', self::NAMESPACE);

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register(): void {}

    private function syncActivityLoggingSetting(): void
    {
        $settingClass = 'Panelis\\Setting\\Models\\Setting';

        if (class_exists($settingClass) && config()->has('activitylog.enabled')) {
            config()->set('activitylog.enabled', $settingClass::get('activity.enabled', config('activitylog.enabled')));
        }
    }
}
