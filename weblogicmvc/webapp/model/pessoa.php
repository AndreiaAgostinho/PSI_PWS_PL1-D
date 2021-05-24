<?php

use \ActiveRecord\Model;

class pessoa extends Model
{
	static $has_many = array(array('bilhetes'));

}