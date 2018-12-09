<?php

namespace core\exception;

class AbsentFieldException extends CoreException
{
	public function __construct(string $field, string $class)
	{
		$message = "Field {$field} not found in class {$class}";
		parent::__construct($message);
	}
}