<?php

namespace core\impl\mvc\activator;

final class ActivatorBuilder
{
	/** @var ActivatorOptions */
	private $_options;
	
	public function __construct() 
	{
		$this->_options = new ActivatorOptions();
	}
	
	public function setControllersNamespace(string $namespace) : self
	{
		$this->_options->setControllerNamespace($namespace);
		
		return $this;
	}
	
	public function setModelsNamespace(string $namespace) : self
	{
		$this->_options->setModelNamespace($namespace);
		
		return $this;
	}
	
	public function setControllerPostfix(string $postfix) : self
	{
		$this->_options->setControllerPostfix($postfix);
		
		return $this;
	}
	
	public function setModelPostfix(string $postfix) : self
	{
		$this->_options->setModelPostfix($postfix);
		return $this;
	}
	
	public function setActionPostfix(string $postfix) : self
	{
		$this->_options->setActionPostfix($postfix);
		
		return $this;
	}
	
	public function build() : Activator
	{
		$options = $this->_options;
		
		$this->_options = new ActivatorOptions();
		
		return new Activator($options);
	}
}