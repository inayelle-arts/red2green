<?php

namespace core\impl\mvc\exception;

use core\exception\CoreException;

class LayoutNotFoundException extends CoreException
{
	public function __construct(string $layoutName, string $path)
	{
		$message = "Layout {$layoutName} not found in {$path}";
		parent::__construct($message);
	}
}