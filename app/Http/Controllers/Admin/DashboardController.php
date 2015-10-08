<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\User;
use App\Notification;
use App\Package;

class DashboardController extends AdminController {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$title = "Dashboard";
		$users = User::count();
		$notifications = Notification::count();
		$packages = Package::count();
		return view('admin.dashboard.index',compact('users','title','notifications','packages'));
	}

}