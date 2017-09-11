<?php

namespace Gayly\Leaf;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LeafServiceProvider extends ServiceProvider
{

	protected $commands		=	[
		'Gayly\Leaf\Console\InstallCommand',
		'Gayly\Leaf\Console\MakeCommand',
		'Gayly\Leaf\Console\UninstallCommand',
	];

	protected $routeMiddleware	=	[
		'leaf.auth'			=>		\Gayly\Leaf\Middleware\Authenticate::class,
		'leaf.log'         	=> 		\Gayly\Leaf\Middleware\LogOperation::class,
        'leaf.permission'  	=> 		\Gayly\Leaf\Middleware\Permission::class,
	];

	protected $middlewareGroups		=	[
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

		$this->registerRoutesFile();

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
	 * register auth route
	 * @return [type] [description]
	 */
	protected function registerAuthRoutes()
	{
		$attributes		=	[
			'prefix'		=>	config('admin.route.prefix'),
			'namespace'		=>	'Gayly\\Leaf\\Controllers',
			'middleware'	=>	config('admin.route.middleware'),
		];

		Route::group($attributes, function ($router) {
			$router->get('login', 'Auth\LoginController@showLoginForm');
			$router->post('login', 'Auth\LoginController@login');
			$router->get('logout', 'Auth\LoginController@logout');
		});
	}

	/**
	 * register route file
	 * @return [type] [description]
	 */
	protected function registerRoutesFile()
	{
		if (file_exists($routes = admin_path('routes.php'))) {
			$this->loadRoutesFrom($routes);
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
