<?php

namespace Gayly\Leaf;

use Auth;
use Closure;
use Gayly\Leaf\Layout\Content;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Gayly\Leaf\Auth\Models\Menu;
use Illuminate\Contracts\Auth\Authenticatable;

class Leaf
{
    protected static $script = [];

    protected static $css = [];

    protected static $js = [];

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
        if ($model instanceof EloquentModel) {
            return $model;
        }

        if (is_string($model) && class_exists($model)) {
            return $this->getModel(new $model());
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

    public static function script($script = '')
    {
        if (!empty($script)) {
            self::$script = array_merge(self::$script, (array) $script);

            return;
        }

        return view('leaf::layouts.script', ['script' => array_unique(self::$script)]);
    }

    public static function css($css = null)
    {
        if (!is_null($css)) {
            self::$css = array_merge(self::$css, (array) $css);

            return;
        }

        //  $css = array_get(Form::collectFieldAssets(), 'css', []);

        static::$css = array_merge(static::$css, (array) $css);

        return view('leaf::layouts.css', ['css' => array_unique(static::$css)]);
    }

    public static function js($js = null)
    {
        if (!is_null($js)) {
            self::$js = array_merge(self::$js, (array) $js);

            return;
        }

        // $js = array_get(Form::collectFieldAssets(), 'js', []);

        static::$js = array_merge(static::$js, (array) $js);

        return view('leaf::layouts.js', ['js' => array_unique(static::$js)]);
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
        return Auth::guard('admin')->user();
    }

    public function menu()
    {
        return (new Menu())->toTree();
    }
}
