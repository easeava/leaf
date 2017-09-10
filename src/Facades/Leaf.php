<?php

namespace Gayly\Leaf\Facades;

use Illuminate\Support\Facades\Facade;

class Leaf extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Gayly\Leaf\Leaf::class;
    }
}
