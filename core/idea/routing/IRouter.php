<?php

namespace core\idea\routing;

use core\idea\http\IHttpContext;

interface IRouter
{
	public function dispatch(IHttpContext $context) : void;
}