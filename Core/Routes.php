<?php

namespace Core;

class Routes
{
	public $controller = 'Home';
	public $action = 'Index';
	public $params = array();
	public $segments = array();
	
	function __construct($segments)
	{
		$this->segments($segments)->controller()->action()->params();
		new Main($this);
	}
	
	private function segments($segments)
	{
		foreach ($segments as $segment)
		{
			if ($segment != '')
			{
				$this->segments[] = $segment;
			}
		}
		return $this;
	}
	
	private function controller()
	{
		$this->controller = ucwords(strtolower((isset($this->segments[0])) ? $this->segments[0] : $this->controller));
		return $this;
	}
	
	private function action()
	{
		$this->action = ucwords(strtolower((isset($this->segments[1])) ? $this->segments[1] : $this->action));
		return $this;
	}
	
	private function params()
	{
		if (count($this->segments) > 2)
		{
			$this->params = array_slice($this->segments, 2);
		}
	}
}
