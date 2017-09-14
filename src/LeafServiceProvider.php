<?php

namespace Gayly\Leaf;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LeafServiceProvider extends ServiceProvider
{
    protected $commands        =    [
        'Gayly\Leaf\Console\InstallCommand',
        'Gayly\Leaf\Console\MakeCommand',
        'Gayly\Leaf\Console\UninstallCommand',
    ];

    protected $routeMiddleware    =    [
        'leaf.redirect'        =>        \Gayly\Leaf\Middleware\Redirect::class,
        'leaf.auth'            =>        \Gayly\Leaf\Middleware\Authenticate::class,
        'leaf.log'             =>        \Gayly\Leaf\Middleware\LogOperation::class,
        'leaf.permission'    =>        \Gayly\Leaf\Middleware\Permission::class,
    ];

    protected $middlewareGroups        =    [
        'leaf' => [
            'leaf.auth',
            'leaf.log',
            'leaf.permission',
        ],
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resource/views', 'leaf');

        $this->registerAuthRoutes();

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config' => config_path()], 'leaf_config');
            $this->publishes([__DIR__ . '/../resource/lang' => resource_path('lang')], 'leaf_lang');
            $this->publishes([__DIR__ . '/../resource/assets' => public_path('vendor/leaf')], 'leaf-assets');
            $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'leaf_migrations');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergerAuthConfig();
        $this->registerMiddlewares();
        $this->mergeDatabaseConfig();
        $this->commands($this->commands);
    }

    /**
     * merge auth config
     * @return [type] [description]
     */
    protected function mergerAuthConfig()
    {
        config(array_dot(config('admin.auth', []), 'auth.'));
    }

    /**
     * merge database config
     * @return [type] [description]
     */
    protected function mergeDatabaseConfig()
    {
        $default = config('database.default');
        config(['database.connections.'.$default.'.prefix' => config('admin.database.prefix')]);
    }

    /**
     * register auth route
     * @return [type] [description]
     */
    protected function registerAuthRoutes()
    {
        $attributes        =    [
            'prefix'        =>    config('admin.route.prefix'),
            'namespace'        =>    'Gayly\\Leaf\\Controllers',
            'middleware'    => 'web',
        ];

        Route::group($attributes, function ($router) {

            $router->group([], function ($router) {
                $router->resource('auth/users', 'UserController');
                $router->resource('auth/roles', 'RoleController');
                $router->resource('auth/permissions', 'PermissionController');
                $router->resource('auth/menus', 'MenuController', ['except' => ['create']]);
                $router->resource('auth/logs', 'LogController', ['only' => ['index', 'destroy']]);
            });

            $router->get('login', 'Auth\LoginController@showLoginForm');
            $router->post('login', 'Auth\LoginController@login');
            $router->get('logout', 'Auth\LoginController@logout');
        });

        $attributes['middleware'] = config('admin.route.middleware');

        if (file_exists($routes = admin_path('routes.php'))) {
            Route::prefix($attributes['prefix'])
                 ->middleware($attributes['middleware'])
                 ->namespace(config('admin.route.namespace'))
                 ->group(admin_path('routes.php'));
        }
    }

    /**
     * register route middleware and groups
     * @return [type] [description]
     */
    protected function registerMiddlewares()
    {
        foreach ($this->routeMiddleware as $key => $value) {
            app('router')->aliasMiddleware($key, $value);
        }

        foreach ($this->middlewareGroups as $key => $value) {
            app('router')->middlewareGroup($key, $value);
        }
    }
}
