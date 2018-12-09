<?php

namespace app\entity;

/**
 * Class User
 * @package app\entity
 * @property int $id
 * @property string $email
 * @property string $password_hash
 */
class User extends EntityBase
{
	protected static $table = 'users';
	
	public static function fields()
	{
		return [
			'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
			
			'email'         => ['type' => 'string', 'required' => true, 'unique' => true],
			'password_hash' => ['type' => 'string', 'required' => true]
		];
	}
}