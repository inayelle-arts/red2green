<?php

namespace core\impl\mvc;

use core\idea\mvc\IModel;

abstract class ModelBase implements IModel
{
	public function __construct() 
	{
		$this->onInit();
	}
	
	protected function onInit() : void
	{
		
	}
}