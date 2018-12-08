<?php

namespace core\idea\routing;

interface IRoute
{
	public const PRIORITY_GROUNDED = 0;
	public const PRIORITY_LOW      = 1;
	public const PRIORITY_MID      = 2;
	public const PRIORITY_HIGH     = 3;
	public const PRIORITY_EXTRA    = 4;
	
	public function getPriority() : int;
	
	public function matches(string $uri) : bool;
	
	public function getName() : string;
	
	public function getPattern() : string;
	
	public function getController() : string;
	
	public function getAction() : string;
	
	public function getRouteParams() : IRouteParams;
}