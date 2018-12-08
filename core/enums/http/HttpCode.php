<?php

namespace core\enums\http;

interface HttpCode
{
	public const OK                = 200;
	public const NO_CONTENT        = 204;
	public const RESET_CONTENT     = 205;
	public const MOVED_PERMANENTLY = 301;
	public const MOVED_TEMPORARILY = 302;
	public const NOT_MODIFIED      = 304;
	public const BAD_REQUEST       = 400;
	public const UNAUTHORIZED      = 401;
	public const FORBIDDEN         = 403;
	public const NOT_FOUND         = 404;
	public const INTERNAL_ERROR    = 500;
}