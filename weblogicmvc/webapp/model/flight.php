<?php

use \ActiveRecord\Model;

class flight extends Model
{
	static $has_many = array(
		array('tickets_flights'),
		array('tickets', 'through' => 'tickets_flights'),
		array('departures'),
		array('arrives')
	);
}