<?php

namespace app\entity;

use Spot\EntityInterface;
use Spot\MapperInterface;

/**
 * Class ScheduledTour
 * @package app\entity
 * @property int $id
 * @property \DateTime starts_at
 * @property Tour tour
 */
class ScheduledTour extends EntityBase
{
	protected static $table = 'tours_schedule';
	
	public static function fields()
	{
		return
			[
				'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
				
				'starts_at' => ['type' => 'date', 'required' => true]
			];
	}
	
	public static function relations(MapperInterface $mapper, EntityInterface $entity)
	{
		return
			[
				'tour' => $mapper->hasOne($entity, Tour::class, 'id')
			];
	}
}