<?php 

namespace Ty\Leaf\Support\Providers;

use Illuminate\Support\ServiceProvider;
use Ty\Leaf\PgNotify;

class LeafProvider extends ServiceProvider
{

	public function boot()
	{

	}

	public function register()
	{

		$this->app->bind('pgnotify', function () {
			return new PgNotify();
		});
	}
}