<?php

use \ActiveRecord\Model;

class ticketsflight extends Model
{
	static $belongs_to = array(
		array('ticket'),
		array('flight')
	);

}