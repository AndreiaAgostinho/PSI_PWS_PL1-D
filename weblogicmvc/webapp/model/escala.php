<?php

use \ActiveRecord\Model;

class escala extends Model
{
	static $belongs_to = array(
		array('bilhete'),
		array('voo')
	);

}