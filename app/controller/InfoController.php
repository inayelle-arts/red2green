<?php

namespace app\controller;

use app\AppControllerBase;

class InfoController extends AppControllerBase
{
	public function parthnersAction() : bool 
	{
		return $this->viewDefault('parthners');
	}
	
	public function warningsAction() : bool
	{
		return $this->viewDefault('warnings');
	}
}