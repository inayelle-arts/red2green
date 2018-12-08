<?php

namespace core\impl\routing\route;

use core\idea\routing\IRouteParams;

class RouteParams implements IRouteParams
{
	/** @var string */
	private $_params;
	
	public function __construct(array $params = [])
	{
		$this->_params = [];
		
		if (!empty($params))
		{
			$this->_params = $params;
			
			foreach ($this->_params as $key => $value)
			{
				if (is_array($value))
				{
					$this->_params[$key] = array_pop($value);
				}
				else
				{
					$this->_params[$key] = $value;
				}
			}
		}
	}
	
	public function getValue(string $key) : ?string
	{
		return $this->_params[$key] ?? null;
	}
	
	public function hasValue(string $key) : bool
	{
		return array_key_exists($key, $this->_params);
	}
}