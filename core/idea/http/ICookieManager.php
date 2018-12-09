<?php

namespace core\idea\http;

interface ICookieManager
{
	public const DEFAULT_TTL = 259200;
	
	public function setValue(string $key, string $value, int $ttl = self::DEFAULT_TTL) : void;
	
	public function getValue(string $key) : ?string;
	
	public function hasValue(string $key) : bool;
	
	public function remove(string $key) : void;
	
	public function removeAll() : void;
}