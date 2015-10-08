<?php namespace App\Http\Controllers;
use App\User;
use App\User_Menu;
use App\Menu;
use Auth;
use Hash;
use Request;
class UserApiController extends Controller {

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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public static function login(Request $request) {
		$input = $request::all();
		$username = $request::get('username');
		$password = $request::get('password');
		if($username==null||$password==null) return ApiController::wrongDataFormat();
		$user=User::where('username','=',$username)->first();
		if($user==null) {
			return UserApiController::usernameNotFound();
		}

		if (!Hash::check($password, $user['password'])) {
			return response()->json(['code' => 4]);
		}

		return response()->json(['code' => 0,'user' => $user]);
	}

	public static function usernameNotFound() {
		return response()->json(['code' => 3]);
	}
	
	public function index($username)
	{
		$user=User::where('username','=',$username)->where('id','=',Auth::user()->id)->first();
		if($user==null) {
			if(Auth::user()->hasRole('admin')) {
				$user=User::where('username','=',$username)->first();
				return view('users.index',compact('user'));
			} else {
				return redirect('home');
			}
			
		}else {

			return view('users.index',compact('user'));
		}
		
	}

	public function paymentdata($username,$date)
	{
		$user=User::where('username','=',$username)->first();
		if($user==null) {
			return null;
		}else {
			$payments= User_Menu::join("menus","users_menus.menu_id","=","menus.id")
			->where("users_menus.user_id","=",$user->id)
			->where("menus.eat_time","LIKE",$date . "%")->select("eat_time","price")->get();
			return ["payments"=>$payments];
		}
		
	}

}
