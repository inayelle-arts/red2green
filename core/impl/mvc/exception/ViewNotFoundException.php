<?php

namespace core\impl\mvc\exception;

use core\exception\CoreException;

class ViewNotFoundException extends CoreException
{
	public function __construct(string $layoutName, string $path)
	{
		$message = "View {$layoutName} not found in {$path}";
		parent::__construct($message);
	}
}