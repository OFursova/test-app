<?php

namespace App\Providers;

use App\Gateways\PlaneGateway;
use App\Gateways\TrainGateway;
use App\Gateways\Transportation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Transportation::class, function($app){
            if (request()->has('plane')) {
                return new PlaneGateway(800);
            } elseif (request()->has('train')) {
                return new TrainGateway(200);
            }  
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
