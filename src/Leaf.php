<?php

namespace Gayly\Leaf;

use Closure;
use Gayly\Leaf\Layout\Content;

class Leaf
{

	public function content(Closure $callable)
	{
		return new Content($callable);
	}
}
