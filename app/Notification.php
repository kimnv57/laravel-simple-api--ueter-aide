<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
    protected $guarded = array();

    public static $rules = array();
	
	//protected $table = 'assigned_roles';
	protected $table = 'notification';

}