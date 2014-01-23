<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'active' => 'development',

	/**
	 * Base config, just need to set the DSN, username and password in env. config.
	 */
	'default' => array(
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

	'redis' => array(
		'default' => array(
			'hostname'  => '127.0.0.1',
			'port'      => 3306,
		)
	),

);
