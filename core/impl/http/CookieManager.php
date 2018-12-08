<?php

namespace core\impl\http;

use core\exception\NotImplementedException;
use core\idea\http\ICookieManager;
use core\structures\Singleton;

class CookieManager implements ICookieManager
{
	use Singleton;
	
	public function setValue(string $key, string $value, int $ttl = self::DEFAULT_TTL) : void
	{
		setcookie($key, $value, time() + $ttl);
	}
	
	public function getValue(string $key) : ?string
	{
		return $_COOKIE[$key] ?? null;
	}
	
	public function hasValue(string $key) : bool
	{
		return array_key_exists($key, $_COOKIE);
	}
	
	public function remove(string $key) : void
	{
		setcookie($key, null, time() - 100);
	}
	
	public function removeAll() : void
	{
		throw new NotImplementedException();
	}
}