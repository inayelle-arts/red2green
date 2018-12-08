<?php

namespace core\impl\mvc\activator;

use core\auxiliary\NamespaceHelper;
use core\idea\http\IHttpContext;
use core\idea\routing\IRoute;
use core\idea\routing\IRouteParams;
use core\impl\mvc\ControllerBase;
use core\impl\mvc\ModelBase;

final class Activator
{
	/** @var ControllerBase[] */
	private $_controllers;
	
	/** @var ModelBase[] */
	private $_models;
	
	/** @var ActivatorOptions */
	private $_options;
	
	public function __construct(ActivatorOptions $options = null)
	{
		$this->_controllers = [];
		$this->_models      = [];
		
		if ($options === null)
		{
			$options = new ActivatorOptions();
		}
		
		$this->_options = $options;
	}
	
	public function getControllerInstance(
		string $name, IHttpContext $context, IRouteParams $params
	) : ControllerBase
	{
		return $this->_getController($name, $context, $params);
	}
	
	public function isValidControllerCall(string $controller, string $action) : bool
	{
		$class  = $this->_getControllerClassName($controller);
		$method = $this->_getActionMethodName($action);
		
		return class_exists($class) && method_exists($class, $method);
	}
	
	public function callController(
		string $controller, string $action, IHttpContext $context, IRouteParams $params
	) : void
	{
		$controller = $this->_getController($controller, $context, $params);
		$method     = $this->_getActionMethodName($action);
		
		$controller->$method();
	}
	
	private function _getController(string $name, ... $ctorParams) : ControllerBase
	{
		if (array_key_exists($name, $this->_controllers))
		{
			return $this->_controllers[$name];
		}
		
		$class = $this->_getControllerClassName($name);
		if (!class_exists($class))
		{
			throw new ActivatorException("Controller ${name} | {$class} not found");
		}
		
		$ctorParams[] = $this;
		$instance     = new $class(... $ctorParams);
		
		$this->_controllers[$name] = $instance;
		return $instance;
	}
	
	private function _getControllerClassName(string $shortName) : string
	{
		$controller = ucwords($shortName).$this->_options->getControllerPostfix();
		
		$className = NamespaceHelper::combine(
			$this->_options->getControllerNamespace(),
			$controller
		);
		
		return $className;
	}
	
	private function _getActionMethodName(string $shortName) : string
	{
		return lcfirst(ucwords($shortName)).$this->_options->getActionPostfix();
	}
}