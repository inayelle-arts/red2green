<?php

namespace core\auxiliary;

use core\structures\StaticClass;

final class StringHelper
{
	use StaticClass;
	
	public static function combine(string $arg0, string ... $args) : string
	{
		foreach ($args as $arg)
		{
			$arg0 .= $arg;
		}
		
		return $arg0;
	}
	
	public static function combineWithGlue(string $glue, string $arg0, string ... $args) : string
	{
		foreach ($args as $arg)
		{
			$arg0 .= $glue.$arg;
		}
		
		return $arg0;
	}
}