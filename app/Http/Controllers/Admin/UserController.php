<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserEditRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Datatables;


class UserController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        // Selected groups
        return view('admin.users.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(UserRequest $request) {

        $user = new User ();
		$user -> username = $request->username;
        $user -> fullname = $request->fullname;
        $user -> stu_code = $request->stu_code;
        $user -> course = $request->course;
        $user -> class = $request->class;
        $user -> email = $request->email;
        $user -> major = $request->major;
        $user -> admin = $request->admin;
        $user -> password = bcrypt($request->password);
        $user -> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {
        $user = User::find($id);

        return view('admin.users.create_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(UserEditRequest $request, $id) {

        $user = User::find($id);
        $user -> fullname = $request->fullname;
        $user -> stu_code = $request->stu_code;
        $user -> course = $request->course;
        $user -> class = $request->class;
        $user -> major = $request->major;
        $user -> admin = $request->admin;

        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user -> password = bcrypt($password);
            }
        }
        $user -> save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */

    public function getDelete($id)
    {
        $user = User::find($id);
        // Show the page
        return view('admin.users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect('admin/users');
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
       $slider =1;

        $users = User::select(array('user.id','user.stu_code', 'user.fullname', 'user.major', 'user.course', 'user.class','user.username','user.email', 'user.created_at'))->orderBy('user.email', 'ASC');
        //$users = User::select(array('users.id','users.name','users.email', 'users.created_at'))->orderBy('users.email', 'ASC');

        return Datatables::of($users)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/users/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->add_column('check','<input type="checkbox" name="check[]" value="{{$id}}"/>')
            ->make(true);
    }

}
