<?php

use \ActiveRecord\Model;

class bilhete extends Model
{
	static $has_many = array(
		array('escalas')
	);
}