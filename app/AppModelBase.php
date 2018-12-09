<?php

namespace app;

use app\entity\Order;
use app\entity\Participant;
use app\entity\ScheduledTour;
use app\entity\Tour;
use app\entity\User;
use core\impl\mvc\ModelBase;
use Spot\Locator;
use Spot\Mapper;

abstract class AppModelBase extends ModelBase
{
	/** @var Locator */
	protected $locator;
	
	/** @var Mapper */
	protected $users;
	
	/** @var Mapper */
	protected $orders;
	
	/** @var Mapper */
	protected $tours;
	
	/** @var Mapper */
	protected $scheduledTours;
	
	/** @var Mapper */
	protected $participants;
	
	protected function onInit() : void
	{
		parent::onInit();
		
		$locator       = Application::getInstance()->getLocalor();
		$this->locator = $locator;
		
		$this->users          = $locator->mapper(User::class);
		$this->orders         = $locator->mapper(Order::class);
		$this->tours          = $locator->mapper(Tour::class);
		$this->scheduledTours = $locator->mapper(ScheduledTour::class);
		$this->participants   = $locator->mapper(Participant::class);
	}
}