<?php

namespace app;

use core\application\ApplicationBase;
use core\application\ApplicationOptionsBuilder;
use core\auxiliary\PathHelper;
use core\impl\mvc\activator\ActivatorBuilder;
use core\impl\routing\route\PatternRoute;
use core\impl\routing\route\StaticRoute;
use core\impl\routing\RouterBuilder;
use core\structures\Singleton;

class Application extends ApplicationBase
{
	protected function configureApp(ApplicationOptionsBuilder $builder) : void
	{
		$configDir  = PathHelper::combine(FS_ROOT, 'config');
		$configFile = 'development.json';
		
		$builder->useConfigDirectory($configDir)
		        ->useConfigFile($configFile);
	}
	
	protected function configureRouter(RouterBuilder $builder) : void
	{
		$indexRoute = new StaticRoute('index', '', 'index', 'index');
		
		$mvcRoute = new PatternRoute('mvc', '{controller:[a-z]+}/{action:[a-z]+}');
		
		$builder->useRoute($indexRoute)
		        ->useRoute($mvcRoute);
	}
	
	protected function configureActivator(ActivatorBuilder $builder) : void
	{
	}
}