<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
'development' => array(
    'type'           => 'pdo',
    'connection'     => array(
        'dsn'            => 'mysql:host=vivelesmoutons.me.uk;dbname=asso_n3',
	    'username'       => 'asso_n3',
	    'password'       => '2xvjPfSpGH',
        'persistent'     => false,
        'compress'       => false,
    ),
    'identifier'     => '"',
    'table_prefix'   => '',
    'charset'        => 'utf8',
    'enable_cache'   => true,
    'profiling'      => false,
    'readonly'       => false,
)
);
