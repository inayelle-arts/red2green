<?php

namespace core\application;

use core\enums\http\HttpCode;
use core\exception\CoreException;
use core\idea\http\IHttpContext;
use core\idea\routing\IRouter;
use core\impl\http\HttpContext;
use core\impl\mvc\activator\Activator;
use core\impl\mvc\activator\ActivatorBuilder;
use core\impl\routing\RouterBuilder;
use core\structures\Singleton;
use Spot\Config;
use Spot\Locator;

abstract class ApplicationBase
{
	use Singleton;
	
	/** @var IHttpContext */
	private $_httpContext;
	
	/** @var IRouter */
	private $_router;
	
	/** @var ApplicationOptions */
	private $_options;
	
	/** @var Activator */
	private $_activator;
	
	/** @var Locator */
	private $_locator;
	
	protected final function __construct()
	{
		$this->_httpContext = new HttpContext();
		$this->_configureAll();
	}
	
	public final function start() : void
	{
		$response = $this->_httpContext->getResponse();
		
		try
		{
			$this->_router->dispatch($this->_httpContext);
		}
		catch (CoreException $coreException)
		{
			$response->setStatusCode(HttpCode::INTERNAL_ERROR);
			echo $coreException->getMessage();
		}
		catch (\Exception $exception)
		{
			$response->setStatusCode(HttpCode::INTERNAL_ERROR);
			echo $exception->getMessage();
		}
		finally
		{
			$response->send();
		}
	}
	
	public final function getLocalor() : Locator
	{
		return $this->_locator;
	}
	
	protected abstract function configureActivator(ActivatorBuilder $builder) : void;
	
	protected abstract function configureApp(ApplicationOptionsBuilder $builder) : void;
	
	protected abstract function configureRouter(RouterBuilder $builder) : void;
	
	private function _configureAll()
	{
		$appOptionsBuilder = new ApplicationOptionsBuilder();
		$this->configureApp($appOptionsBuilder);
		$this->_options = $appOptionsBuilder->build();
		
		$config = new Config();
		foreach ($this->_options->getConnectionParams() as $name => $params)
		{
			$config->addConnection($name, $params);
		}
		$this->_locator = new Locator($config);
		
		$activatorBuilder = new ActivatorBuilder();
		$this->configureActivator($activatorBuilder);
		$this->_activator = $activatorBuilder->build();
		
		$routerBuilder = new RouterBuilder();
		$this->configureRouter($routerBuilder);
		$this->_router = $routerBuilder->build($this->_activator);
	}
}