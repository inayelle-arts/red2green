<?php

namespace core\idea\http;

interface ISessionManager
{
	public function setValue(string $key, string $value) : void;
	
	public function getValue(string $key) : ?string;
	
	public function hasValue(string $key) : bool;
	
	public function removeValue(string $key) : void;
	
	public function reset() : void;
	
	public function commit() : void;
}