<?php

namespace app\controller;

use app\AppControllerBase;

class NotFoundController extends AppControllerBase
{
	public function indexAction() : void 
	{
		$this->view('index', 'default');
	}
}