<?php

use \ActiveRecord\Model;

class arrive extends Model
{
	static $belongs_to = array(
		array('airport'),
		array('flight')
	);
}