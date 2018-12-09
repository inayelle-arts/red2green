<?php

namespace app\entity;

use Spot\EntityInterface;
use Spot\MapperInterface;

/**
 * Class Order
 * @package app\entity
 * @property int $id
 * @property int userId
 * @property int $scheduledTourId
 * @property \DateTime $created_at
 * @property float $totalCost
 * @property bool $isNotified
 * @property bool $isApproved
 * @property User $user
 * @property ScheduledTour $tour
 * @property Participant $participants
 */
class Order extends EntityBase
{
	protected static $table = 'orders';
	
	public static function fields()
	{
		return
			[
				'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
				
				'created_at'       => ['type' => 'date', 'required' => true, 'default' => new \DateTime()],
				'total_cost'       => ['type' => 'decimal', 'default' => 0],
				'is_notified'      => ['type' => 'boolean', 'default' => false],
				'is_approved'      => ['type' => 'boolean', 'default' => false],
				'is_paid'          => ['type' => 'boolean', 'default' => false],
				'transaction_code' => ['type' => 'string', 'default' => null],
			];
	}
	
	public static function relations(MapperInterface $mapper, EntityInterface $entity)
	{
		return
			[
				'tour' => $mapper->hasOne($entity, ScheduledTour::class, 'id'),
				'user' => $mapper->hasOne($entity, User::class, 'id'),
			];
	}
}