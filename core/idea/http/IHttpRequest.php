<?php

namespace core\idea\http;

interface IHttpRequest
{
	public function getMethod() : string;
	
	public function getQueryParam(string $key) : ?string;
	
	public function getQueryString() : string;
	
	public function getUri() : string;
	
	public function getHeader(string $key) : ?string;
	
	public function getBody() : ?string;
	
	public function hasQueryParam(string $key) : bool;
	
	public function hasHeader(string $key) : bool;
}