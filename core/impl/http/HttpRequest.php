<?php

namespace core\impl\http;

use core\enums\http\HttpMethod;
use core\idea\http\IHttpRequest;

class HttpRequest implements IHttpRequest
{
	const HTTP_HEADER_PREFIX = 'HTTP_';
	/** @var string */
	private $_method;
	
	/** @var string[] */
	private $_params;
	
	/** @var string */
	private $_body;
	
	/** @var string[] */
	private $_headers;
	
	/** @var string */
	private $_queryString;
	
	/** @var string */
	private $_uri;
	
	public function __construct()
	{
		$this->_method = $_SERVER['REQUEST_METHOD'];
		
		$this->_uri         = self::_getUri();
		$this->_queryString = self::_getQueryString();
		$this->_headers     = self::_getHeaders();
		$this->_body        = self::_getBody();
		$this->_params      = self::_getQueryParams();
	}
	
	public function getMethod() : string
	{
		return $this->_method;
	}
	
	public function getQueryParam(string $key) : ?string
	{
		return $this->_params[$key] ?? null;
	}
	
	public function getHeader(string $key) : ?string
	{
		return $this->_headers[$key] ?? null;
	}
	
	public function getBody() : ?string
	{
		return $this->_body;
	}
	
	public function hasQueryParam(string $key) : bool
	{
		return array_key_exists($key, $this->_params);
	}
	
	public function hasHeader(string $key) : bool
	{
		return array_key_exists($key, $this->_headers);
	}
	
	public function getQueryString() : string
	{
		return $this->_queryString;
	}
	
	public function getUri() : string
	{
		return $this->_uri;
	}
	
	private static function _getQueryString() : string
	{
		return trim($_SERVER['QUERY_STRING'], '/');
	}
	
	private static function &_getQueryParams() : array
	{
		switch ($_SERVER['REQUEST_METHOD'])
		{
			case HttpMethod::POST:
				{
					return $_POST;
					break;
				}
			case HttpMethod::GET:
			default:
				{
					return $_GET;
					break;
				}
		}
	}
	
	private static function _getHeaders() : array
	{
		$headers = [];
		
		foreach ($_SERVER as $key => $value)
		{
			if (substr($key, 0, 5) === self::HTTP_HEADER_PREFIX)
			{
				$key = str_replace(self::HTTP_HEADER_PREFIX, '', $key);
				
				$key = str_replace('_', '-', $key);
				
				$key = strtolower($key);
				
				$key = ucwords($key, '-');
				
				$headers[$key] = $value;
			}
		}
		
		return $headers;
	}
	
	private static function _getBody() : string
	{
		return file_get_contents('php://input');
	}
	
	private static function _getUri() : string
	{
		return trim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
	}
}