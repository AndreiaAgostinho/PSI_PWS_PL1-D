<?php

use \ActiveRecord\Model;

class partida extends Model
{
	static $belongs_to = array(
		array('aeroporto'),
		array('voo')
	);
}