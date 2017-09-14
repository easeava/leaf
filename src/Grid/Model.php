<?php

namespace Gayly\Leaf\Grid;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model
{

	protected $model;

	public function __construct(EloquentModel $model)
	{
		$this->model = $model;
	}

	public function eloquent()
	{
		return $this->model;
	}

}
