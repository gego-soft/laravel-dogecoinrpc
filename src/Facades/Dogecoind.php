<?php

namespace Gegosoft\Dogecoin\Facades;

use Illuminate\Support\Facades\Facade;

class Dogecoind extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dogecoind';
    }
}
