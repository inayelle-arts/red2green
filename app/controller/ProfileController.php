<?php

namespace app\controller;

use app\AppControllerBase;

class ProfileController extends AppControllerBase
{
	public function before() : bool
	{
		parent::before();
		
		if ($this->user == null)
		{
			$this->redirect('/sign/in');
			return false;
		}
		
		return true;
	}
	
	public function indexAction() : bool
	{
		return $this->viewDefault('index', 'profile index');
	}
}