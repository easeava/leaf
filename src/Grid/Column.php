<?php

namespace Gayly\Leaf\Grid;

use Closure;
use Gayly\Leaf\Grid;

class Column
{

	protected $name;

	protected $label;

	protected static $model;

	public function __construct($name, $label)
	{
		$this->name = $name;
		$this->label = $this->formatLabel($label);
	}

	protected function formatLabel($label)
    {
        $label = $label ?: ucfirst($this->name);

        return str_replace(['.', '_'], ' ', $label);
    }

	public function getLabel()
	{
		return $this->label;
	}

	public function setRelation($relation, $relationColumn = null)
    {
        $this->relation = $relation;
        $this->relationColumn = $relationColumn;

        return $this;
    }

	protected function isRelation()
    {
        return (bool) $this->relation;
    }

	/**
     * Set grid instance for column.
     *
     * @param Grid $grid
     */
    public function setGrid(Grid $grid)
    {
        $this->grid = $grid;

        $this->setModel($grid->model()->eloquent());
    }

    /**
     * Set model for column.
     *
     * @param $model
     */
    public function setModel($model)
    {
        if (is_null(static::$model) && ($model instanceof Model)) {
            static::$model = $model->newInstance();
        }
    }
}
