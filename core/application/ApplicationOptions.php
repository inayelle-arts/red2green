<?php

namespace core\application;

use core\auxiliary\PathHelper;

final class ApplicationOptions
{
	/** @var string */
	private $_configDir;
	
	/** @var string */
	private $_appConfigFile;
	
	public function __construct()
	{
		$this->_configDir     = PathHelper::combine(FS_ROOT, 'config');
		$this->_appConfigFile = 'config.json';
	}
	
	public function getConfigDir() : string
	{
		return $this->_configDir;
	}
	
	public function setConfigDir(string $configDir) : void
	{
		$this->_configDir = $configDir;
	}
	
	public function getAppConfigFile() : string
	{
		return PathHelper::combine($this->_configDir, $this->_appConfigFile);
	}
	
	public function setAppConfigFile(string $appConfig) : void
	{
		$this->_appConfigFile = $appConfig;
	}
}