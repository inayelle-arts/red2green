<?php

namespace app\controller;

use app\NeedsAuthController;

class ProfileController extends NeedsAuthController
{
	public function indexAction() : bool
	{
		return $this->viewDefault('index', 'profile index');
	}
}