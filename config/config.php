<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dogecoind JSON-RPC Scheme
    |--------------------------------------------------------------------------
    | URI scheme of dogecoin Core's JSON-RPC server.
    |
    | Use https to enable SSL connections with Core,
    | but this is strongly discouraged by developers.
    |
    */

    'scheme' => env('DOGECOIND_SCHEME', 'http'),

    /*
    |--------------------------------------------------------------------------
    | Dogecoind JSON-RPC Host
    |--------------------------------------------------------------------------
    | Tells service provider which hostname or IP address
    | dogecoin Core is running at.
    |
    | If dogecoin Core is running on the same PC as
    | laravel project use localhost or 127.0.0.1.
    |
    | If you're running dogecoin Core on the different PC,
    | you may also need to add rpcallowip=<server-ip-here> to your dogecoin.conf
    | file to allow connections from your laravel client.
    |
    */

    'host' => env('DOGECOIND_HOST', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | Dogecoind JSON-RPC Port
    |--------------------------------------------------------------------------
    | The port at which dogecoin Core is listening for JSON-RPC connections.
    | Default is 8332 for mainnet and 18332 for testnet.
    | You can also directly specify port by adding rpcport=<port>
    | to dogecoin.conf file.
    |
    */

    'port' => env('DOGECOIND_PORT', 9332),

    /*
    |--------------------------------------------------------------------------
    | Dogecoind JSON-RPC User
    |--------------------------------------------------------------------------
    | Username needs to be set exactly as in dogecoin.conf file
    | rpcuser=<username>.
    |
    */

    'user' => env('DOGECOIND_USER', ''),

    /*
    |--------------------------------------------------------------------------
    | Dogecoind JSON-RPC Password
    |--------------------------------------------------------------------------
    | Password needs to be set exactly as in dogecoin.conf file
    | rpcpassword=<password>.
    |
    */

    'password' => env('DOGECOIND_PASSWORD', ''),

    /*
    |--------------------------------------------------------------------------
    | Dogecoind JSON-RPC Server CA
    |--------------------------------------------------------------------------
    | If you're using SSL (https) to connect to your dogecoin Core
    | you can specify custom ca package to verify against.
    | Note that using dogecoin JSON-RPC over SSL is strongly discouraged.
    |
    */

    'ca' => null,
];
