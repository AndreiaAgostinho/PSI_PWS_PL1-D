<?php

use \ActiveRecord\Model;

class aeroporto extends Model
{
	static $has_many = array(
		array('partidas'),
		array('chegadas')

	);
}