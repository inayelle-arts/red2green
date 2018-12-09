<?php

namespace app\controller;

use app\AppControllerBase;
use app\model\Tours;

class IndexController extends AppControllerBase
{
	/** @var Tours */
	private $_model;

	protected function onInit()
	{
		$this->_model = $this->getModelInstance('tours');
	}
	
	public function indexAction() : bool 
	{
		$tours = $this->_model->getTop3Tours();
		
		return $this->view('index', 'default', $tours);
	}
}