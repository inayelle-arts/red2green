<?php

namespace app;

use app\entity\User;

class NeedsAuthController extends AppControllerBase
{
	/** @var User */
	protected $user;
	
	protected function onInit()
	{
		parent::onInit();
		
		$this->user = $this->_deserializeSessionUser();
	}
	
	public function before() : bool
	{
		if ($this->user == null)
		{
			$this->redirect('/sign/in');
			return false;
		}
		
		return true;
	}
	
	private function _deserializeSessionUser() : ?User
	{
		$json = $this->session->getValue('user');
		
		if ($json == null)
		{
			return null;
		}
		
		$userData = json_decode($json, true);
		
		return new User($userData);
	}
}