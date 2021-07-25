<?php

namespace Adroit11\Whmcs;

use Illuminate\Support\ServiceProvider;

use Adroit11\Whmcs\Console\InstallWhmcs;

class WhmcsServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../config/whmcs.php', 'whmcs');
  }

  public function boot()
  {
    if ($this->app->runningInConsole()) {
        $this->publishes([
                __DIR__.'/../config/whmcs.php' => config_path('whmcs.php'),
            ], 'config');

        $this->commands([
            InstallWhmcs::class,
        ]);
    }
  }
}