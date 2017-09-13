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

    /**
     * get title
     * @return [type] [description]
     */
    public function title()
    {
        return config('admin.title');
    }

    public static function css()
    {

    }

    public static function js()
    {

    }
}
