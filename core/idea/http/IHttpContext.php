<?php

namespace core\idea\http;

interface IHttpContext
{
	public function getRequest() : IHttpRequest;
	
	public function getResponse() : IHttpResponse;
	
	public function getSession() : ISessionManager;
	
	public function getCookie() : ICookieManager;
}