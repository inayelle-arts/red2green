<?php

namespace app;

use app\entity\User;
use core\impl\mvc\ControllerBase;

abstract class AppControllerBase extends ControllerBase
{
	/** @var User */
	protected $user;
	
	private const USER_SESSION_KEY = 'user';
	
	protected const DEFAULT_LAYOUT = 'default';
	
	protected final function viewDefault(string $view, $data = null) : bool
	{
		return parent::view($view, static::DEFAULT_LAYOUT, $data, $this->user);
	}
	
	protected final function view(
		string $view, string $layout = null, $data = null, $user = null
	) : bool
	{
		return parent::view($view, $layout, $data, $this->user);
	}
	
	protected final function notFound() : bool
	{
		return $this->getControllerInstance('notFound')->view('index', 'default');
	}
	
	public function before() : bool
	{
		if ($this->session->hasValue(self::USER_SESSION_KEY))
		{
			$this->user = json_decode($this->session->getValue(self::USER_SESSION_KEY));
		}
		else
		{
			$this->user = null;
		}
		
		return true;
	}
	
	protected function forgetUser() : void
	{
		$this->user = null;
		$this->session->removeValue(self::USER_SESSION_KEY);
	}
	
	protected function keepUser(User $user) : void
	{
		$this->user = $user;
		$this->session->setValue(self::USER_SESSION_KEY, json_encode($user));
	}
}