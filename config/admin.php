<?php

return [

    /**
     * system name
     */
    'name'    =>    'Leaf Console',

    /**
     * html title
     */
    'title'    =>    'Leaf Console',

    /**
     * version
     */
    'version'    =>    'v-beta-0.0.1',

    'directory'    =>    app_path('Admin'),

    /**
     * route configure
     */
    'route'    =>    [
        'prefix'    =>    'admin',
        'namespace'    =>    'App\\Admin\\Controllers',
        'middleware'=>    ['web', 'leaf'],
    ],

    /**
     * https
     */
    'secure'    =>    false,

    /**
     * auth guards setting
     */
    'auth'    =>    [
        'guards'    =>    [
            'admin' =>    [
                'driver'    =>    'session',
                'provider'    =>    'admins',
            ],
        ],

        'providers'    =>    [
            'admins'    =>    [
                'driver'    =>    'eloquent',
                'model'        =>    \Gayly\Leaf\Auth\Models\LeafUser::class,
            ],
        ],
    ],

    /**
     * database setting
     */
    'database'    =>    [
        'prefix'    =>  'leaf_',
        'users_table'    =>    'leaf_users',
        'roles_table'    =>    'roles',
        'roles_model'   =>  Gayly\Leaf\Auth\Models\Role::class,
        'permissions_table'    =>    'permissions',
        'permissions_model' =>  Gayly\Leaf\Auth\Models\Permission::class,
        'menus_table'    =>    'menus',
        'operation_log_table'    => 'operation_log',
        'user_permissions_table' => 'user_permissions',
        'role_users_table'       => 'role_users',
        'role_permissions_table' => 'role_permissions',
        'role_menu_table'        => 'role_menus',
    ],

    /**
     * upload setting
     */
    'upload'    =>        [
        'disk'        =>    'admin',
        'directory'    =>    [
            'image'    =>    'images',
            'file'    =>    'files'
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
