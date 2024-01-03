<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Faker\{Factory, Generator};
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;


class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // The singleton method binds a class or interface into the service container so that Laravel can maintain dependency (when using an interface as the constructor parameter). 
        // (Actually Singleton is a design pattern. 
        // Singleton implementation always returns the same object on subsequent calls instead of a new instance)
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerPicsumImagesProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}




