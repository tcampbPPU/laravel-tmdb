<?php

namespace Tcamp\Tmdb;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FathomServiceProvider extends PackageServiceProvider
{
    public function register()
    {
        parent::register();

        $this->app->bind(Tmdb::class, function () {
            return new Tmdb(config('tmdb.token'));
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('tmdb')
            ->hasConfigFile();
    }
}
