<?php

namespace app\controller;

use app\AppControllerBase;
use app\model\Tours;

class TourController extends AppControllerBase
{
	protected const DEFAULT_LAYOUT = 'tour';
	
	/** @var Tours */
	private $_model;
	
	protected function onInit()
	{
		$this->_model = $this->getModelInstance('tours');
	}
	
	// GET tour/{tour:[a-z]+}
	public function infoAction(string $tour) : bool
	{
		$tour = $this->_model->getTourByLink($tour);
		
		if ($tour == null)
		{
			return $this->notFound();
		}
		
		if ($tour->html_article == null)
		{
			return $this->viewDefault('default', $tour);
		}
		
		return $this->viewDefault($tour->html_article, $tour);
	}
}