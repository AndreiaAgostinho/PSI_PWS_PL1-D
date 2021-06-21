<?php

use \ActiveRecord\Model;

class flight extends Model
{
	static $has_many = array(
		array('ticketsflights'),
		array('tickets', 'through' => 'ticketsflights')
		
	);

	static $belongs_to = array(
		array('departure'),
		array('arrival'),
		array('airport', 'through' => 'departure'),
		array('airport', 'through' => 'arrival'),
		array('airplane')
	);
}