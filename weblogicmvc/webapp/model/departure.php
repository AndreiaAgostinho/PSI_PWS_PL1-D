<?php

use \ActiveRecord\Model;

class departure extends Model
{
	static $belongs_to = array(
		array('airport'),
		array('flight')
	);
}