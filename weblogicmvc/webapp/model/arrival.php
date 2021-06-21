<?php

use \ActiveRecord\Model;

class arrival extends Model
{
	static $belongs_to = array(
		array('airport')
	);

	static $has_one = array(
		array('flight')
	);
}