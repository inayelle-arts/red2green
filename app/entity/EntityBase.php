<?php

namespace app\entity;

use Spot\Entity;

abstract class EntityBase extends Entity implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return get_object_vars($this);
	}
}