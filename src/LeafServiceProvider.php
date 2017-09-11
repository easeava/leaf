<?php

namespace Gayly\Leaf;
use Illuminate\Support\ServiceProvider;

class LeafServiceProvider extends ServiceProvider
{

	protected $commands		=	[
		'Gayly\Leaf\Console\InstallCommand',
	];

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../resource/views', 'leaf');

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

		$this->commands($this->commands);
	}
}
