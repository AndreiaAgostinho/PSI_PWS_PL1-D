<?php

use \ActiveRecord\Model;

class ticket_flight extends Model
{
	static $belongs_to = array(
		array('ticket'),
		array('flight')
	);

}