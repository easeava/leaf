<?php 

namespace Ty\Leaf\Support\Facades;

use Illuminate\Support\Facades\Facade;

class PgNotifyFacade extends Facade 
{

	protected static function getFacadeAccessor()
	{
		return 'pgnotify';
	}
}