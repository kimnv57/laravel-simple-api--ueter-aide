<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {
	
	//protected $table = 'assigned_roles';
	protected $table = 'package';
	protected $fillable = ['name','content'];

}