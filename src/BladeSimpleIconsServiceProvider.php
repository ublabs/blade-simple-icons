<?php

declare(strict_types=1);

namespace Ublabs\BladeSimpleIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeSimpleIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('simple-icons', [
                'path' => __DIR__ . '/../resources/svg',
                'prefix' => 'simpleicon',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-simple-icons'),
            ], 'blade-simple-icons');
        }
    }
}
