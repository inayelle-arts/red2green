<?php

namespace app\model;

use app\AppModelBase;
use app\entity\User;

class Sign extends AppModelBase
{
	public function signUp(string $email, string $passwordHash) : bool
	{
		/** @var User|null $user */
		$user = $this->users->first(['email' => $email]);
		
		if ($user != null)
		{
			return false;
		}
		
		$user = self::_createUser($email, $passwordHash);
		
		$this->users->insert($user);
		
		return $user->id != null;
	}
	
	public function signIn(string $email, string $passwordHash) : ?User
	{
		/** @var User|null $user */
		$user = $this->users->first(['email' => $email, 'password_hash' => $passwordHash]);
		
		return $user;
	}
	
	private static function _createUser(string $email, string $passwordHash) : User
	{
		$user = new User();
		
		$user->email         = $email;
		$user->password_hash = $passwordHash;
		
		return $user;
	}
}