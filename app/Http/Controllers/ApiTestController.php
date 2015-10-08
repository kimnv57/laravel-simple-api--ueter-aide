<?php namespace App\Http\Controllers;
use Request;
use Exception;
class ApiTestController extends AdminController {
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
	
	public function index()
	{
		return view('pages.apitest');
		
	}

	public function apis(Request $request)
	{
		try {
			$input = $request::all();
			if($input['api']==null) return $this->wrongDataFormat();
			$api = $input['api'];

			switch($api) {
        		case 'login':
        			return UserApiController::login($request);
        		default : 
        			return 'default';
        	}

		} catch (Exception $e) {
			return $this->wrongDataFormat();
		}
		
	}

	public static function wrongDataFormat() {
		return response()->json(['code' => 2]);
	}


}
