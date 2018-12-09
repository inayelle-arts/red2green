<?php

namespace core\impl\routing;

use core\enums\http\HttpCode;
use core\idea\http\IHttpContext;
use core\idea\routing\IRoute;
use core\idea\routing\IRouter;
use core\impl\mvc\activator\Activator;
use core\impl\routing\route\RouteBase;

class Router implements IRouter
{
	/** @var IRoute[] */
	private $_routes;
	
	/** @var IRoute */
	private $_defaultRoute;
	
	/** @var Activator */
	private $_activator;
	
	public function __construct(Activator $activator, RouterOptions $options = null)
	{
		if ($options == null)
		{
			$options = new RouterOptions();
		}
		
		$this->_routes       = $options->getRoutes();
		$this->_defaultRoute = $options->getNotFoundRoute();
		$this->_activator    = $activator;
	}
	
	public function dispatch(IHttpContext $context) : void
	{
		$response = $context->getResponse();
		
		$this->_sortRoutesByPriority();
		
		$uri = $context->getRequest()->getUri();
		
		$matchedRoute = $this->_defaultRoute;
		
		foreach ($this->_routes as $route)
		{
			if ($route->matches($uri))
			{
				$matchedRoute = $route;
				break;
			}
		}
		
		if ($matchedRoute == null)
		{
			$response->setStatusCode(HttpCode::NOT_FOUND);
		}
		else
		{
			$this->_callMvc($matchedRoute, $context);
		}
	}
	
	private function _callMvc(IRoute $route, IHttpContext $context) : void
	{
		$controller = $route->getController();
		$action     = $route->getAction();
		
		$routeParams = $route->getRouteParams();
		
		if (!$this->_activator->isValidControllerCall($controller, $action))
		{
			$context->getResponse()->setStatusCode(HttpCode::NOT_FOUND);
			return;
		}
		
		$instance = $this->_activator->getControllerInstance(
			$controller,
			$context,
			$routeParams
		);
		
		if ($instance->before())
		{
			$this->_activator->callController($controller, $action, $context, $routeParams);
			$instance->after();
		}
	}
	
	private function _sortRoutesByPriority() : void
	{
		usort($this->_routes, [RouteBase::class, 'compare']);
	}
}