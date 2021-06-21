<?php

use \ActiveRecord\Model;

class departure extends Model
{
	static $belongs_to = array(
		array('airport')
	);

	static $has_one = array(
		array('flight')
	);
}