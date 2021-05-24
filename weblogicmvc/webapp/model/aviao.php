<?php

use \ActiveRecord\Model;

class aviao extends Model
{
	static $has_many = array(
		array('voos')
	);
}