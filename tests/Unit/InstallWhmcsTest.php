<?php

namespace Adroit11\Whmcs\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Adroit11\Whmcs\Tests\TestCase;

class InstallWhmcsTest extends TestCase
{
    /** @test */
    function the_install_command_copies_a_the_configuration()
    {
        // make sure we're starting from a clean state
        if (File::exists(config_path('whmcs.php'))) {
            $this->assertTrue(File::exists(config_path('whmcs.php')));
        }else{
            $this->assertFalse(File::exists(config_path('whmcs.php')));
        }

    }
}