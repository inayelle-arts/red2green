<?php

namespace core\impl\routing\route;

use core\auxiliary\RegexHelper;
use core\idea\routing\IRouteParams;
use core\impl\routing\RoutingException;

class PatternRoute extends RouteBase
{
	/** @var IRouteParams */
	private $_routeParams;
	
	public function __construct(
		string $name, string $pattern, int $priority = 0, string $controller = null,
		string $action = null
	)
	{
		parent::__construct($name, $pattern, $controller, $action, $priority);
	}
	
	public function matches(string $uri) : bool
	{
		$regex = $this->_getRouteRegex();
		$match = [];
		
		if (RegexHelper::matchAllGroups($regex, $uri, $match))
		{
			$this->_routeParams = new RouteParams($match);
			
			$this->_bindParams();
			
			$this->_validateMvcParams();
			
			return true;
		}
		
		return false;
	}
	
	public function getRouteParams() : IRouteParams
	{
		return $this->_routeParams;
	}
	
	private function _getRouteRegex() : string
	{
		$regex       = '{(?P<name>[a-z]+):(?P<regex>[a-z0-9_\-\[\]\?\.\*\(\){}\+\,]+)}';
		$pattern     = $this->getPattern();
		
		$pattern = trim($pattern, '/');
		
		$replacement = "(?P<$1>$2)";
		
		return RegexHelper::replaceAllGroups($regex, $pattern, $replacement);
	}
	
	private function _bindParams() : void
	{
//		if ($this->_routeParams->hasValue('controller'))
		if (!isset($this->controller))
		{
			$this->controller = $this->_routeParams->getValue('controller');
		}
		
//		if ($this->_routeParams->hasValue('action'))
		if (!isset($this->action))
		{
			$this->action = $this->_routeParams->getValue('action') ?? "index";
		}
	}
	
	private function _validateMvcParams() : void
	{
		if (!isset($this->controller))
		{
			throw new RoutingException('controller');
		}
		
		if (!isset($this->action))
		{
			throw new RoutingException('action');
		}
	}
}