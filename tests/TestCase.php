<?php

namespace Adroit11\Whmcs\Tests;

use Adroit11\Whmcs\WhmcsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      WhmcsServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    $app['config']->set('session.driver', 'array');
  }
}