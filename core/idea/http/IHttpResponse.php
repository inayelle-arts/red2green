<?php

namespace core\idea\http;

interface IHttpResponse
{
	public function setStatusCode(int $code) : void;
	
	public function setHeader(string $key, string $value) : void;
	
	public function setBody(string $body) : void;
	
	public function appendBody(string $body) : void;
	
	public function send() : void;
}