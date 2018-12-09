<?php

namespace core\idea\routing;

interface IRouteParams
{
	public function getValue(string $key) : ?string;
	
	public function hasValue(string $key) : bool;
	
	public function asArray() : array;
}