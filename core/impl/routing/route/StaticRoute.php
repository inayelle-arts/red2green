<?php

namespace core\impl\routing\route;

use core\idea\routing\IRouteParams;

class StaticRoute extends RouteBase
{
	/** @var IRouteParams */
	private $_routeParams;
	
	public function __construct(
		string $name, string $pattern, string $controller, string $action, int $priority = 10
	)
	{
		parent::__construct($name, $pattern, $controller, $action, $priority);
		
		$params =
			[
				'controller' => $controller,
				'action'     => $action
			];
		
		$this->_routeParams = new RouteParams($params);
		
	}
	
	public function matches(string $uri) : bool
	{
		return $uri === $this->getPattern();
	}
	
	public function getRouteParams() : IRouteParams
	{
		return $this->_routeParams;
	}
}