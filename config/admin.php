<?php

return [

	/**
	 * system name
	 */
	'name'			=>		'Leaf Console',

	/**
	 * html title
	 */
	'title'			=>		'Leaf Console',

	/**
	 * version
	 */
	'version'		=>		'v-beta-0.0.1',

	'directory'		=>		app_path('Admin'),

	/**
	 * route configure
	 */
	'route'		=>		[
		'prefix'		=>		'admin',
		'namespace'		=>		'\\App\\Admin\\Controllers',
		'middleware'	=>		['web', 'admin'],
	],

	/**
	 * https
	 */
	'secure'	=>		false,

	/**
	 * auth guards setting
	 */
	'auth'		=>		[
		'guards' => [
			'admin' => [
				'driver' => 'session',
				'provider' => 'admins',
			],
		],

        'providers' => [
            'admins' => [
                'driver' => 'eloquent',
                'model'  => Gayly\Leaf\Auth\Models\User::class,
            ],
        ],
	],

	/**
	 * database setting
	 */
	'database'	=>		[
		'users_table'			=>	'admin_users',

		'roles_table'			=>	'admin_roles',

		'permissions_table'		=>	'admin_permissions',

		'menus_table'			=>	'admin_menus',

		'operation_log_table'    => 'admin_operation_log',
		'user_permissions_table' => 'admin_user_permissions',
		'role_users_table'       => 'admin_role_users',
		'role_permissions_table' => 'admin_role_permissions',
		'role_menu_table'        => 'admin_role_menu',
	],

	/**
	 * upload setting
	 */
	'upload'	=>		[
		'disk'		=>	'admin',
		'directory'	=>	[
			'image'	=>	'images',
			'file'	=>	'files'
		],
	],

	/*
     * By setting this option to open or close operation log in laravel-admin.
     */
    'operation_log'   => [

        'enable' => true,

        /*
         * Routes that will not log to database.
         *
         * All method to path like: admin/auth/logs
         * or specific method to path like: get:admin/auth/logs
         */
        'except' => [
            'admin/auth/logs*',
        ],
    ],
];
