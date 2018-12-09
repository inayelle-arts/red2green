<?php

namespace app\model;

use app\AppModelBase;
use app\entity\Tour;

class Tours extends AppModelBase
{
	public function create(Tour $tour) : void 
	{
		$this->tours->insert($tour);
	}
	
	public function get()
	{
		return $this->scheduledTours->all()->execute();
	}
}