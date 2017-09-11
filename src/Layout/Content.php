<?php

namespace Gayly\Leaf\Layout;

use Closure;
use Illuminate\Contracts\Support\Renderable;

class Content implements Renderable
{
	/**
	 * 头部标题
	 * @var [string]
	 */
	protected $header = '';

	/**
	 * 描述
	 * @var [string]
	 */
	protected $description = '';

	/**
	 * Row
	 */
	protected $row = [];

	public function __construct(Closure $callback = null)
	{
		if ($callback instanceof Closure) {
			$callback($this);
		}
	}

	public function header(String $header = '')
	{
		$this->header = $header;

		return $this;
	}

	public function description(String $description = '')
	{
		$this->description = $description;

		return $this;
	}

	protected function addRow()
	{

	}

	public function build()
	{

	}

	public function render()
	{
		$items = [
			'header' 		=> 	$this->header,
			'description' 	=> 	$this->description,
			'content' 		=> 	$this->build(),
		];

		return view('leaf::content', $items)->render();
	}

	public function __toString()
	{
		return $this->render();
	}
}
