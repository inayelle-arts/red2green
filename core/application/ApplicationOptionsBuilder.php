<?php

namespace core\application;

final class ApplicationOptionsBuilder
{
	/** @var ApplicationOptions */
	private $_options;
	
	public function __construct() 
	{
		$this->_options = new ApplicationOptions();
	}
	
	public function useConfigDirectory(string $path) : self
	{
		$this->_options->setConfigDir($path);
		
		return $this;
	}
	
	public function useConfigFile(string $fileName) : self
	{
		$this->_options->setAppConfigFile($fileName);
		
		return $this;
	}
	
	public function build() : ApplicationOptions
	{
		$options = $this->_options;
		
		$this->_options = new ApplicationOptions();
		
		return $options;
	}
}