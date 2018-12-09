<?php

namespace core\auxiliary;

use core\structures\StaticClass;

final class PathHelper
{
	use StaticClass;
	
	public const PATH_DELIMITER = DIRECTORY_SEPARATOR;
	
	public static function combine(string $path, string ... $parts) : string
	{
		foreach ($parts as $part)
		{
			$path .= self::PATH_DELIMITER.$part;
		}
		
		return $path;
	}
}