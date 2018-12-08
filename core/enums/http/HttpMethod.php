<?php

namespace core\enums\http;

interface HttpMethod
{
	public const GET    = 'GET';
	public const POST   = 'POST';
	public const PUT    = 'PUT';
	public const PATCH  = 'PATCH';
	public const DELETE = 'DELETE';
}