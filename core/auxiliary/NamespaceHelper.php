<?php

namespace core\auxiliary;

use core\structures\StaticClass;

final class NamespaceHelper
{
	use StaticClass;
	
	public const NAMESPACE_DELIMITER = '\\';
	
	public static function combine(string $namespace, string ... $parts) : string
	{
		foreach ($parts as $part)
		{
			$namespace .= self::NAMESPACE_DELIMITER.$part;
		}
		
		return $namespace;
	}
}