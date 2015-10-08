<?php namespace App\Http\Controllers;
use App\News;
use Auth;

class PageController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	

	public function home()
	{
		if (Auth::guest())
		{
			return view('pages.about');
		}
		if (!Auth::user()->isAdmin()) {
			return view('pages.about');
		}
		return redirect('admin/dashboard');
	}
	public function about()
	{
		return view('pages.about');
	}

}
