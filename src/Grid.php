<?php

namespace Gayly\Leaf;

use Closure;
use Gayly\Leaf\Exception\Handler;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Gayly\Leaf\Grid\Column;
use Gayly\Leaf\Grid\Model;

class Grid
{

	protected $model;

	protected $columns;

	protected $dbColumns;

	protected $rows;

	protected $keyName = 'id';

	protected $builder;

	protected $builded = false;

	protected $variables = [];

   protected $view = 'leaf::grid.table';

	public function __construct(Eloquent $model, Closure $builder)
	{
		$this->model = new Model($model);
		$this->keyName = $model->getKeyName();
		$this->columns = new Collection();
		$this->rows = new Collection();
		$this->builder = $builder;
	}

	public function model()
	{
		return $this->model;
	}

	protected function addColumn($column = '', $label = '')
    {
        $column = new Column($column, $label);
        $column->setGrid($this);

        return $this->columns[] = $column;
    }

	/**
     * Get the table columns for grid.
     *
     * @return void
     */
    protected function setDbColumns()
    {
        $connection = $this->model()->eloquent()->getConnectionName();

        $this->dbColumns = collect(Schema::connection($connection)->getColumnListing($this->model()->getTable()));
    }

	public function column($name, $label = '')
    {
        $relationName = $relationColumn = '';

        if (strpos($name, '.') !== false) {
            list($relationName, $relationColumn) = explode('.', $name);

            $relation = $this->model()->eloquent()->$relationName();

            $label = empty($label) ? ucfirst($relationColumn) : $label;

            $name = snake_case($relationName).'.'.$relationColumn;
        }

        $column = $this->addColumn($name, $label);

        if (isset($relation) && $relation instanceof Relation) {
            $this->model()->with($relationName);
            $column->setRelation($relationName, $relationColumn);
        }

        return $column;
    }

	public function columns($columns = [])
    {
        if (func_num_args() == 0) {
            return $this->columns;
        }

        if (func_num_args() == 1 && is_array($columns)) {
            foreach ($columns as $column => $label) {
                $this->column($column, $label);
            }

            return;
        }

        foreach (func_get_args() as $column) {
            $this->column($column);
        }
    }

    /**
     * Handle table column for grid.
     *
     * @param string $method
     * @param string $label
     *
     * @return bool|Column
     */
    protected function handleTableColumn($method, $label)
    {
        if (empty($this->dbColumns)) {
            $this->setDbColumns();
        }

        if ($this->dbColumns->has($method)) {
            return $this->addColumn($method, $label);
        }

        return false;
    }

	public function processFilter()
    {
        call_user_func($this->builder, $this);
        // return $this->filter->execute();
    }

	protected function variables()
    {
        $this->variables['grid'] = $this;

        return $this->variables;
    }

	public function build()
	{
		// if ($this->builded) {
		// 	return;
		// }

		$this->processFilter();

		// $this->builded = true;
	}

	public function render()
	{
		try {
            $this->build();
        } catch (\Exception $e) {
            return Handler::renderException($e);
        }

        return view($this->view, $this->variables())->render();
	}

	public function __call($method, $argments)
	{
		$label = isset($arguments[0]) ? $arguments[0] : ucfirst($method);
		//
		// if ($column = $this->handleTableColumn($method, $label)) {
        //     return $column;
        // }
		// dump($method);
        return $this->addColumn($method, $label);
	}

	public function __toString()
	{
		return $this->render();
	}
}
