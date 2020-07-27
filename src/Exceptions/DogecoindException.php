<?php

namespace Gegosoft\Dogecoin\Exceptions;

use RuntimeException;

class DogecoindException extends RuntimeException
{
    /**
     * Construct new dogecoin exception.
     *
     * @param object $error
     *
     * @return void
     */
    public function __construct($error)
    {
        parent::__construct($error['message'], $error['code']);
    }
}
