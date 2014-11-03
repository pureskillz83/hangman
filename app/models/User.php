<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// custom define table name instead of pre-generating
	protected $table = 'users';
	// model attributes hidden from returned data
	protected $hidden = array('password', 'remember_token');
        
        
        
}
