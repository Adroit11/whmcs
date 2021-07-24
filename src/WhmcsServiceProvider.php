<?php

namespace Adroit11\Whmcs;

use Illuminate\Support\ServiceProvider;

use Adroit11\Whmcs\Console\InstallWhmcs;

class WhmcsServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    if ($this->app->runningInConsole()) {
        $this->commands([
            InstallWhmcs::class,
        ]);
    }
  }
}