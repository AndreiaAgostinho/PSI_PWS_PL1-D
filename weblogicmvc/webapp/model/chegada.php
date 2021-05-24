<?php

use \ActiveRecord\Model;

class chegada extends Model
{
	static $belongs_to = array(
		array('aeroporto'),
		array('voo')
	);
}