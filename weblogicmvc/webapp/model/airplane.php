<?php

use \ActiveRecord\Model;

class airplane extends Model
{
	static $has_many = array(
		array('flights')
	);
}