<?php

namespace Shaon\Facades;

use Illuminate\Support\Facades\Facade;

class MapBox extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'map-box'; // This should match the key you use to bind the service in the service provider.
    }
}
