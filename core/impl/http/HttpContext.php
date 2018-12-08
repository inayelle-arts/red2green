<?php

namespace core\impl\http;

use core\idea\http\ICookieManager;
use core\idea\http\IHttpContext;
use core\idea\http\IHttpRequest;
use core\idea\http\IHttpResponse;
use core\idea\http\ISessionManager;

class HttpContext implements IHttpContext
{
	/** @var IHttpRequest */
	private $_request;
	
	/** @var IHttpResponse */
	private $_response;
	
	/** @var ISessionManager */
	private $_session;
	
	/** @var ICookieManager */
	private $_cookie;
	
	public function __construct()
	{
		$this->_request  = new HttpRequest();
		$this->_response = new HttpResponse();
		
		$this->_session = SessionManager::getInstance();
		$this->_cookie  = CookieManager::getInstance();
	}
	
	public function getRequest() : IHttpRequest
	{
		return $this->_request;
	}
	
	public function getResponse() : IHttpResponse
	{
		return $this->_response;
	}
	
	public function getSession() : ISessionManager
	{
		return $this->_session;
	}
	
	public function getCookie() : ICookieManager
	{
		return $this->_cookie;
	}
}