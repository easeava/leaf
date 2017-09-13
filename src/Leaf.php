<?php

namespace Gayly\Leaf;

use Auth;
use Closure;
use Gayly\Leaf\Layout\Content;
use Illuminate\Database\Eloquent\Model;

class Leaf
{
    public function content(Closure $callable)
    {
        return new Content($callable);
    }

    public function form($model, Closure $callable)
    {
        return new Form($this->getModel($model, $callable));
    }

    public function grid($model, Closure $callable)
    {
        return new Grid($this->getModel($model), $callable);
    }

    public function getModel($model)
    {
        if ($model instanceof Model) {
            return $model;
        }

        if (is_string($model) && class_exists($model)) {
            return $this->getModel($model);
        }

        throw new InvalidArgumentException("$model is not a vali model");
    }

    /**
     * get title
     * @return [type] [description]
     */
    public function title()
    {
        return config('admin.title');
    }

    public static function script()
    {

    }

    public static function css()
    {

    }

    public static function js()
    {

    }

    public function user()
    {
        return Auth::guard('admin')->user();
    }
}
