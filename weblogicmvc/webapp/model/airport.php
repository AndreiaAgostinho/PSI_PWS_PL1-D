<?php

use \ActiveRecord\Model;

class airport extends Model
{
	static $has_many = array(
		array('departures'),
		array('arrives')

	);
}