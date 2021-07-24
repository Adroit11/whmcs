<?php

namespace Adroit11\Whmcs\Facades;

use Illuminate\Support\Facades\Facade;

class whmcs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'whmcs';
    }
}