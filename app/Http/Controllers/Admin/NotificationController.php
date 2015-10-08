<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Notification;
use App\Http\Requests\Admin\NotificationRequest;
use App\Http\Requests\Admin\NotificationEditRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Datatables;
use App\Package;


class NotificationController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.notifications.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        // Selected groups
        $packages = Package::all();
        return view('admin.notifications.create_edit',compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(NotificationRequest $request) {

        $notification = new Notification ();
        $notification -> title = $request->title;
		$notification -> content = $request->content;
        $notification -> package_id = $request->package_id;
        $notification -> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $Notification
     * @return Response
     */
    public function getEdit($id) {
        $notification = Notification::find($id);
        $package = Package::find($notification->package_id)->first();
        return view('admin.notifications.create_edit', compact('notification','package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $Notification
     * @return Response
     */
    public function postEdit(NotificationEditRequest $request, $id) {

        $notification = Notification::find($id);
        $notification -> title = $request->title;
        $notification -> content = $request->content;
        $notification -> save();
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $Notification
     * @return Response
     */

    public function getDelete($id)
    {
        $notification = Notification::find($id);
        // Show the page
        return view('admin.notifications.delete', compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $Notification
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $notification= Notification::find($id);
        $notification->delete();
        return redirect('admin/notifications');
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {

        $notifications = Notification::join('package','package.id','=','notification.package_id')->select(array('package.name','notification.id','notification.is_read', 'notification.title', 'notification.content', 'notification.created_at'))->orderBy('notification.id', 'ASC');
        //$notifications = Notification::select(array('notifications.id','notifications.name','notifications.email', 'notifications.created_at'))->orderBy('notifications.email', 'ASC');

        return Datatables::of($notifications)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/notifications/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/notifications/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->add_column('check','<input type="checkbox" name="check[]" value="{{$id}}"/>')
            ->make(true);
    }

}
