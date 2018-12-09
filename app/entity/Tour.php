<?php

namespace app\entity;

/**
 * Class Tour
 * @package app\entity
 * @property int $id
 * @property string $name
 * @property string $short_description
 * @property string $full_description
 * @property string $link
 * @property int $cost_per_customer
 * @property int $days_in_space
 * @property int $days_on_earth
 * @property string $src_main_image
 * @property string $html_article
 */
class Tour extends EntityBase
{
	protected static $table = 'tours';
	
	public static function fields()
	{
		return [
			'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
			
			'name'              => ['type' => 'string', 'unique' => true, 'required' => true],
			'short_description' => ['type' => 'string', 'required' => true],
			'full_description'  => ['type' => 'text', 'required' => true],
			'link'              => ['type' => 'string', 'required' => true],
			'html_article'      => ['type' => 'string'],
			'src_main_image'    => ['type' => 'string', 'required' => true],
			'cost_per_customer' => ['type' => 'decimal', 'required' => true],
			'days_in_space'     => ['type' => 'smallint', 'required' => true],
			'days_on_earth'     => ['type' => 'smallint', 'required' => true],
		];
	}
}	