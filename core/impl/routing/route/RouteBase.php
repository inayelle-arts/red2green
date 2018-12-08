<?php

namespace core\impl\routing\route;

use core\idea\routing\IRoute;

abstract class RouteBase implements IRoute
{
	/** @var string */
	private $_name;
	
	/** @var string */
	private $_pattern;
	
	/** @var string */
	protected $controller;
	
	/** @var string */
	protected $action;
	
	/** @var int */
	private $_priority;
	
	public function __construct(
		string $name, string $pattern, string $controller, string $action, int $priority
	)
	{
		$this->_name      = $name;
		$this->_pattern   = $pattern;
		$this->controller = $controller;
		$this->action     = $action;
		$this->_priority  = $priority;
	}
	
	public function getPattern() : string
	{
		return $this->_pattern;
	}
	
	public function getName() : string
	{
		return $this->_name;
	}
	
	public function getController() : string
	{
		return $this->controller;
	}
	
	public function getAction() : string
	{
		return $this->action;
	}
	
	public function getPriority() : int
	{
		return $this->_priority;
	}
	
	public static function compare(RouteBase $first, RouteBase $last) : bool 
	{
		return $first->getPriority() > $last->getPriority();
	}
}