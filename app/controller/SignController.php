<?php

namespace app\controller;

use app\AppControllerBase;
use app\entity\User;
use app\model\Sign;

class SignController extends AppControllerBase
{
	/** @var Sign */
	private $_model;
	
	protected function onInit()
	{
		$this->_model = $this->getModelInstance('sign');
	}
	
	// GET sign/in
	public function inAction() : bool
	{
		return $this->viewDefault('in');
	}
	
	// POST sign/postin
	public function postInAction() : bool
	{
		$email    = $this->request->getQueryParam('email');
		$password = $this->request->getQueryParam('password');
		
		if ($email == null || $password == null)
		{
			return $this->signInFailed();
		}
		
		/** @var User $user */
		$user = $this->_model->signIn($email, $password);
		
		if ($user == null)
		{
			return $this->signInFailed();
		}
		
		$this->keepUser($user);
		
		return $this->redirect('/');
	}
	
	// GET sign/up
	public function upAction() : bool
	{
		return $this->content('up');
	}
	
	// POST sign/postUp
	public function postUpAction() : bool
	{
		$email    = $this->request->getQueryParam('email');
		$password = $this->request->getQueryParam('password');
		
		if ($email == null || $password == null)
		{
			return $this->signUpFailed();
		}
		
		if ($this->_model->signUp($email, $password))
		{
			return $this->redirect('/');
		}
		
		return $this->signUpFailed();
	}
	
	// GET sign/out
	public function outAction() : bool
	{
		$this->forgetUser();
		return $this->redirect('/');
	}
	
	protected function signInFailed() : bool
	{
		return $this->viewDefault('in', 'Login or/and password are not valid');
	}
	
	protected function signUpFailed() : bool
	{
		return $this->viewDefault('up', 'User with same login already exists');
	}
}