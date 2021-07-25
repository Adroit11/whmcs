<?php

namespace Adroit11\Whmcs\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Adroit11\Whmcs\Tests\TestCase;
use Adroit11\Whmcs\Whmcs;

class InstallWhmcsTest extends TestCase
{
    /** @test */
    public function testInstallCommand()
    {
        // make sure we're starting from a clean state
        if (File::exists(config_path('whmcs.php'))) {
            unlink(config_path('whmcs.php'));
        }

        $this->assertFalse(File::exists(config_path('whmcs.php')));

        Artisan::call('whmcs:install');

        $this->assertTrue(File::exists(config_path('whmcs.php')));
    }

    public function testInstantiated()
    {
        $instance = $this->app->make('whmcs');

        $this->assertInstanceOf(Whmcs::class, $instance);
    }
}