<?php

namespace core\impl\http;

use core\idea\http\ISessionManager;
use core\structures\Singleton;

class SessionManager implements ISessionManager
{
	use Singleton;
	
	public function __construct() 
	{
		if (session_status() !== PHP_SESSION_ACTIVE)
		{
			session_start();
		}
	}
	
	public function setValue(string $key, string $value) : void
	{
		$_SESSION[$key] = $value;
	}
	
	public function getValue(string $key) : ?string
	{
		return $_SESSION[$key] ?? null;
	}
	
	public function hasValue(string $key) : bool
	{
		return array_key_exists($key, $_SESSION);
	}
	
	public function reset() : void
	{
		session_reset();
	}
	
	public function commit() : void
	{
		session_write_close();
	}
	
	public function removeValue(string $key) : void
	{
		unset($_SESSION[$key]);
	}
}