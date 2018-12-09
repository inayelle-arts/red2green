<?php

namespace core\structures;

trait Singleton
{
	private static $__instance__;
	
	protected function __construct() { }
	
	public static final function getInstance() : self
	{
		return (self::$__instance__ ?? (self::$__instance__ = new static()));
	}
}