<?php

namespace core\impl\routing;

use core\idea\routing\IRoute;
use core\impl\routing\route\StaticRoute;

final class RouterOptions
{
	/** @var IRoute[] */
	private $_routes;
	
	/** @var IRoute */
	private $_notFoundRoute;
	
	public function __construct()
	{
		$this->_routes = [];
	}
	
	public function addRoute(IRoute $route) : void
	{
		$this->_routes[] = $route;
	}
	
	public function setNotFoundRoute(StaticRoute $route) : void
	{
		$this->_notFoundRoute = $route;
	}
	
	/**
	 * @return IRoute[]
	 */
	public function getRoutes() : array 
	{
		return $this->_routes;
	}
	
	public function getNotFoundRoute() : ?IRoute
	{
		return $this->_notFoundRoute;
	}
}