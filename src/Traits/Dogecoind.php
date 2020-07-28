<?php

namespace Gegosoft\Dogecoin\Traits;

trait Dogecoind
{
    public function dogecoind()
    {
        return app('dogecoind');
    }
}
