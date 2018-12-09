<?php

namespace app;

use core\impl\mvc\ControllerBase;

abstract class AppControllerBase extends ControllerBase
{
	protected const DEFAULT_LAYOUT = 'default';
	
	protected final function viewDefault(string $view, $data = null) : bool 
	{
		return parent::view($view, static::DEFAULT_LAYOUT, $data);
	}
	
	protected final function notFound() : bool 
	{
		return $this->getControllerInstance('notFound')->view('index', 'default');
	}
}