<?php

namespace core\auxiliary;

use core\structures\StaticClass;

final class RegexHelper
{
	use StaticClass;
	
	private const DELIMITER = '#';
	
	public static function match(string $pattern, string $string) : bool
	{
		$pattern = StringHelper::combine(self::DELIMITER, $pattern, self::DELIMITER);
		return preg_match($pattern, $string);
	}
	
	public static function matchGroups(string $pattern, string $string, array &$matches) : bool
	{
		$pattern = StringHelper::combine(self::DELIMITER, $pattern, self::DELIMITER);
		return preg_match($pattern, $string, $matches);
	}
	
	public static function matchAllGroups(string $pattern, string $string, array &$matches) : bool
	{
		$pattern = StringHelper::combine(self::DELIMITER, $pattern, self::DELIMITER);
		
		if (preg_match_all($pattern, $string, $matches))
		{
			$matches = self::_filterNumericGroups($matches);
			
			return true;
		}
		
		return false;
	}
	
	public static function replaceAllGroups(
		string $pattern, string $string, string $replacement
	) : string
	{
		$pattern = StringHelper::combine(self::DELIMITER, $pattern, self::DELIMITER);
		
		return preg_replace($pattern, $replacement, $string);
	}
	
	private static function _filterNumericGroups(array $data) : array
	{
		return ArrayHelper::filterKeys(
			$data,
			function ($key) : bool
			{
				return is_string($key);
			}
		);
	}
}