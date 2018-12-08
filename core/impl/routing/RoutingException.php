<?php

namespace core\impl\routing;

use core\exception\CoreException;

class RoutingException extends CoreException
{
	public function __construct(string $noSuitableWhat)
	{
		parent::__construct("Route matched, but no suitable {$noSuitableWhat} found");
	}
}