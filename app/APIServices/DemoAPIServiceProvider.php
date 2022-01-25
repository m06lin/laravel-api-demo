<?php

namespace App\APIServices;

use Illuminate\Support\ServiceProvider;
use App\APIServices\IPSMService;

class DemoAPIServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function provides()
    {
        return [
            IPSMService::class
        ];
    }

    public function register()
    {
        $this->app->singleton(IPSMService::class, function ($app) {
            $curlService = new \Ixudra\Curl\CurlService();
            $config = config('demo');

            return new IPSMService($config, $curlService);
        });
    }

    public function boot()
    {
        //
    }
}
