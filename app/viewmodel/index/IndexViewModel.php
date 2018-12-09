<?php

namespace app\viewmodel\index;

use app\model\Tours;
use Spot\Entity\Collection;

class IndexViewModel
{
	/** @var Collection */
	private $_tours;
	
	public function __construct(Collection $tours) 
	{
		$this->_tours = $tours;
	}
	
	/**
	 * @return Tours[]|Collection
	 */
	public function getTours()
	{
		return $this->_tours;	
	}
}