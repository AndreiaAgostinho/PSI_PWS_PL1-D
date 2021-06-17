<?php

use \ActiveRecord\Model;

class ticket extends Model
{
	static $has_many = array(
		array('tickets_flights')
	);
}