<?php

namespace app;

use core\application\ApplicationBase;
use core\application\ApplicationOptionsBuilder;
use core\auxiliary\PathHelper;
use core\impl\mvc\activator\ActivatorBuilder;
use core\impl\routing\route\PatternRoute;
use core\impl\routing\route\StaticRoute;
use core\impl\routing\RouterBuilder;

class Application extends ApplicationBase
{
	protected function configureApp(ApplicationOptionsBuilder $builder) : void
	{
		$configDir  = PathHelper::combine(FS_ROOT, 'config');
		$configFile = 'development.json';
		
		$builder->useConfigDirectory($configDir)
		        ->useConfigFile($configFile);
		
		$connectionParams =
			[
				'dbname'   => 'red_to_green',
				'user'     => 'ina',
				'password' => 'blessx375',
				'host'     => 'localhost',
				'driver'   => 'pdo_pgsql',
			];
		
		$builder->useConnectionParams('default', $connectionParams);
	}
	
	protected function configureRouter(RouterBuilder $builder) : void
	{
		$indexRoute = new StaticRoute(
			'index',
			'',
			'index',
			'index'
		);
		
		$tourRoute = new PatternRoute(
			'tourInfo',
			'^tour/{tour:[a-z]+}$',
			PatternRoute::PRIORITY_MID,
			'tour',
			'info'
		);
		
		$orderRoute = new PatternRoute(
			'orderTour',
			'^order/{tour:[a-z]+}$',
			PatternRoute::PRIORITY_MID,
			'order',
			'orderSpecifiedTour'
		);
		
		$mvcRoute = new PatternRoute(
			'mvc',
			'^{controller:[a-z]+}/{action:[a-z]+}?$',
			PatternRoute::PRIORITY_GROUNDED
		);
		
		$builder->useRoute($indexRoute)
		        ->useRoute($tourRoute)
		        ->useRoute($orderRoute)
		        ->useRoute($mvcRoute);
	}
	
	protected function configureActivator(ActivatorBuilder $builder) : void
	{
	}
}