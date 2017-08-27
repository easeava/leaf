<?php 

namespace Ty\Leaf;

class PgNotify
{

	public function default($message = '', $style = '', $position = '', $type = '', $timeout = 1)
	{
		$option = [
			'style' 	=> $style?: 'bar',
	        'message' 	=> $message?:'',
	        'position' 	=> $position?:'top',
	        'type' 		=> $type?:'default',
	        'timeout' 	=> $timeout?:4000,
		];

		return json_encode($option);
	}

	public function info($message = '', $style = '', $position = '', $type = 'info', $timeout = 4000)
	{
		return $this->default($message, $style, $position, $type, $timeout);
	}


	public function success($message = '', $style = '', $position = '', $type = 'success', $timeout = 4000)
	{
		return $this->default($message, $style, $position, $type, $timeout);
	}

	public function danger($message = '', $style = '', $position = '', $type = 'danger', $timeout = 4000)
	{
		return $this->default($message, $style, $position, $type, $timeout);
	}

	public function warning($message = '', $style = '', $position = '', $type = 'warning', $timeout = 4000)
	{
		return $this->default($message, $style, $position, $type, $timeout);
	}

}
