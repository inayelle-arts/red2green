<?php

namespace core\auxiliary;

use core\structures\StaticClass;

final class ArrayHelper
{
	use StaticClass;
	
	public static function filterValues(array $data, callable $predicate) : array 
	{
		return array_filter($data, $predicate);
	}
	
	public static function filterKeys(array $data, callable $predicate) : array 
	{
		return array_filter($data, $predicate, ARRAY_FILTER_USE_KEY);
	}
}