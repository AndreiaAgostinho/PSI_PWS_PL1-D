<?php

use \ActiveRecord\Model;

class people extends Model
{
	static $has_many = array(array('tickets'));

}