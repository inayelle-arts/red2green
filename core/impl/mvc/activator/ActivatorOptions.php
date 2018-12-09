<?php

namespace core\impl\mvc\activator;

use core\auxiliary\NamespaceHelper;

final class ActivatorOptions
{
	/** @var string */
	private $_controllerNamespace;
	
	/** @var string */
	private $_modelNamespace;
	
	/** @var string */
	private $_controllerPostfix;
	
	/** @var string */
	private $_modelPostfix;
	
	/** @var string */
	private $_actionPostfix;
	
	public function __construct()
	{
		$this->_controllerNamespace = NamespaceHelper::combine('app', 'controller');
		$this->_modelNamespace      = NamespaceHelper::combine('app', 'model');
		
		$this->_controllerPostfix = 'Controller';
		$this->_modelPostfix      = '';
		$this->_actionPostfix     = 'Action';
	}
	
	public function getControllerNamespace() : string
	{
		return $this->_controllerNamespace;
	}
	
	public function setControllerNamespace(string $controllerNamespace) : void
	{
		$this->_controllerNamespace = $controllerNamespace;
	}
	
	public function getModelNamespace() : string
	{
		return $this->_modelNamespace;
	}
	
	public function setModelNamespace(string $modelNamespace) : void
	{
		$this->_modelNamespace = $modelNamespace;
	}
	
	public function getControllerPostfix() : string
	{
		return $this->_controllerPostfix;
	}
	
	public function setControllerPostfix(string $controllerPostfix) : void
	{
		$this->_controllerPostfix = $controllerPostfix;
	}
	
	public function getModelPostfix() : string
	{
		return $this->_modelPostfix;
	}
	
	public function setModelPostfix(string $modelPostfix) : void
	{
		$this->_modelPostfix = $modelPostfix;
	}
	
	public function getActionPostfix() : string
	{
		return $this->_actionPostfix;
	}
	
	public function setActionPostfix(string $actionPostfix) : void
	{
		$this->_actionPostfix = $actionPostfix;
	}
}