<?php

use \ActiveRecord\Model;

class voo extends Model
{
	static $has_many = array(
		array('escalas'),
		array('bilhetes', 'through' => 'escalas'),
		array('partidas'),
		array('chegadas')
	);
}