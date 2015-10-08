<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Package;
use App\Http\Requests\Admin\PackageRequest;
use App\Http\Requests\Admin\PackageEditRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Datatables;


class PackageController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.packages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        // Selected groups
        return view('admin.packages.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(PackageRequest $request) {

        $package = new Package ();
        $package -> name = $request->name;
		$package -> content = $request->content;
        $package -> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $package
     * @return Response
     */
    public function getEdit($id) {
        $package = package::find($id);

        return view('admin.packages.create_edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $package
     * @return Response
     */
    public function postEdit(packageEditRequest $request, $id) {

        $package = package::find($id);
        $package -> name = $request->name;

        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $package -> password = bcrypt($password);
            }
        }
        $package -> save();
        AssignedRoles::where('package_id','=',$package->id)->delete();
        foreach($request->roles as $item)
        {
            $role = new AssignedRoles;
            $role -> role_id = $item;
            $role -> package_id = $package -> id;
            $role -> save();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $package
     * @return Response
     */

    public function getDelete($id)
    {
        $package = package::find($id);
        // Show the page
        return view('admin.packages.delete', compact('package'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $package
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $package= package::find($id);
        $package->delete();
        return redirect('admin/packages');
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
       $slider =1;

        $packages = Package::select(array('package.id','package.name', 'package.content', 'package.created_at'))->orderBy('package.name', 'ASC');
        //$packages = package::select(array('packages.id','packages.name','packages.email', 'packages.created_at'))->orderBy('packages.email', 'ASC');

        return Datatables::of($packages)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/packages/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/packages/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->add_column('check','<input type="checkbox" name="check[]" value="{{$id}}"/>')
            ->make(true);
    }

}
