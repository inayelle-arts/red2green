<?php

namespace app\entity;

use Spot\EntityInterface;
use Spot\MapperInterface;

/**
 * Class Participant
 * @package app\entity
 * @property int id
 * @property string full_name
 * @property string res_personal_card
 * @property string res_medical_card
 * @property Order order
 */
class Participant extends EntityBase
{
	protected static $table = 'participants';
	
	public static function fields()
	{
		return
			[
				'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
				
				'full_name'         => ['type' => 'string', 'required' => true],
				'res_personal_card' => ['type' => 'string', 'required' => true],
				'res_medical_card'  => ['type' => 'string', 'required' => true],
			];
	}
	
	public static function relations(MapperInterface $mapper, EntityInterface $entity)
	{
		return
			[
				'order' => $mapper->hasOne($entity, Order::class, 'id')
			];
	}
}