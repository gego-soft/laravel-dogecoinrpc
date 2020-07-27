<?php

if (! function_exists('dogecoind')) {
    /**
     * Get dogecoind client instance.
     *
     * @return \Gegosoft\Dogecoin\Client
     */
    function dogecoind()
    {
        return app('dogecoind');
    }
}
