<?php
/**
 * @author Joshua Perez <joshuaperezmelgazo@gmail.com>
 */
namespace App\AppetiserCodingChallenge\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\AppetiserCodingChallenge\Repository\EventRepositoryInterface',
            'App\AppetiserCodingChallenge\Repository\Eloquent\EventRepository'
        );
    }
}