<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
'development' => array(
    'type'           => 'pdo',
    'connection'     => array(
        'dsn'            => 'mysql:host=62.210.193.152;dbname=applistage',
        'username'       => 'applistage',
        'password'       => 'applistage ',
        'persistent'     => false,
        'compress'       => false,
    ),
    'identifier'     => '"',
    'table_prefix'   => '',
    'charset'        => 'utf8',
    'enable_cache'   => true,
    'profiling'      => false,
    'readonly'       => false,
),
/**'development' => array(
    'type'           => 'mysqli',
    'connection'     => array(
        'hostname'       => 'localhost',
        'port'           => '3306',
        'database'       => 'asso_n3',
        'username'       => 'asso_n3',
        'password'       => '2xvjPfSpGH',
        'persistent'     => false,
        'compress'       => false,
    ),
    'identifier'     => '`',
    'table_prefix'   => '',
    'charset'        => 'utf8',
    'enable_cache'   => true,
    'profiling'      => false,
    'readonly'       => false,
),*/
);
