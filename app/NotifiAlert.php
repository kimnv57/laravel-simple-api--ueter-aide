<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifiAlert extends Model {
    protected $guarded = array();

    public static $rules = array();
	
	//protected $table = 'assigned_roles';
	protected $table = 'notifi_alert';

}