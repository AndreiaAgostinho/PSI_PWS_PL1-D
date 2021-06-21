<?php

use \ActiveRecord\Model;

class ticket extends Model
{
	static $has_many = array(
		array('tickets_flights'),
	);

	static $belongs_to = array(
		array('people')
	);

}