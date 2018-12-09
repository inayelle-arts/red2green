<?php

namespace app\controller;

use app\AppControllerBase;

class ParthnersController extends AppControllerBase
{
	public function indexAction() : bool 
	{
		return $this->viewDefault('index');
	}
}