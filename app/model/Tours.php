<?php

namespace app\model;

use app\AppModelBase;
use app\entity\Tour;

class Tours extends AppModelBase
{
	public function getTourByLink(string $link) : ?Tour
	{
		$result = $this->tours->first(['link' => $link]);
		
		if (!$result)
		{
			return null;
		}
		
		return $result;
	}
	
	public function getTop3Tours()
	{
		return $this->tours->all()->limit(3)->execute();
	}
}