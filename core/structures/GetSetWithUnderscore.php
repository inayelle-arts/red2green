<?php

namespace core\structures;

use core\exception\AbsentFieldException;

trait GetSetWithUnderscore
{
	public function __get(string $field)
	{
		$field = '_'.$field;
		
		if (!property_exists($this, $field))
		{
			throw new AbsentFieldException($field, static::class);
		}
		
		return $this->$field;
	}
	
	public function __set(string $field, $value) : void
	{
		$field = '_'.$field;
		
		if (!property_exists($this, $field))
		{
			throw new AbsentFieldException($field, static::class);
		}
		
		$this->$field = $value;
	}
}