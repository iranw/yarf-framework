<?php

return array(
    'mysql'=>array(
        //default connect
        'default' => array(
            'driver'    => 'mysql',
            'host'      => '',
            'database'  => '',
            'username'  => '',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
        'enWriteDb' => array(
            'driver'    => 'mysql',
            'host'      => '',
            'database'  => '',
            'username'  => '',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),
    // 'memcached' => array(
    //     array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
    //     array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
    // ),
    // 'cache'=>array(
    //     'driver' => 'file',
    //     'path' => storage_path().'/cache',
    //     'connection' => null,
    //     'table' => 'cache',
    //     'memcached' => array(
    //         array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
    //     ),
    //     'prefix' => 'gc_',
    // ),
);
