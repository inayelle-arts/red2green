<?php

namespace core\impl\routing;

use core\idea\routing\IRoute;
use core\impl\mvc\activator\Activator;
use core\impl\routing\route\StaticRoute;

final class RouterBuilder
{
	/** @var RouterOptions */
	private $_options;
	
	public function __construct()
	{
		$this->_options = new RouterOptions();
	}
	
	public function useRoute(IRoute $route) : self
	{
		$this->_options->addRoute($route);
		
		return $this;
	}
	
	public function useDefaultRoute(StaticRoute $route) : self
	{
		$this->_options->setNotFoundRoute($route);
		
		return $this;
	}
	
	public function build(Activator $activator) : Router
	{
		$options = $this->_options;
		
		$this->_options = new RouterOptions();
		
		return new Router($activator, $options);
	}
}