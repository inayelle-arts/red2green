<?php

namespace core\impl\http;

use core\enums\http\HttpCode;
use core\idea\http\IHttpResponse;

class HttpResponse implements IHttpResponse
{
	/** @var int */
	private $_code;
	
	/** @var string */
	private $_body;
	
	/** @var string[] */
	private $_headers;
	
	public function __construct()
	{
		$this->_code    = HttpCode::OK;
		$this->_body    = '';
		$this->_headers = [];
	}
	
	public function setStatusCode(int $code) : void
	{
		$this->_code = $code;
	}
	
	public function setHeader(string $key, string $value) : void
	{
		$this->_headers[$key] = $value;
	}
	
	public function setBody(string $body) : void
	{
		$this->_body = $body;
	}
	
	public function appendBody(string $body) : void
	{
		$this->_body .= $body;
	}
	
	public function send() : void
	{
		http_response_code($this->_code);
		
		foreach ($this->_headers as $key => $value)
		{
			header("{$key}: {$value}");
		}
		
		echo $this->_body;
	}
}