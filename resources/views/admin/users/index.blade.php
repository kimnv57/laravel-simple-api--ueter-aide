@extends('admin.default')

{{-- Web site Title --}}
@section('title') {{{ Lang::get("admin/users.users") }}} :: @parent
@stop
@section('styles')
@parent
<link rel="stylesheet" type="text/css" href="{{URL::to('/css/jquery.datatables.css')}}">
<link href="{{ URL::to('/css/colorbox.css') }}" rel="stylesheet" type="text/css">
@stop
{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>
            {{{ Lang::get("admin/users.users") }}}
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{{ URL::to('admin/users/create') }}}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> {{
					Lang::get("admin/modal.new") }}</a>
                </div>
            </div>
        </h3>
    </div>
<div class="row">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th >MSV</th>
                <th >Full name</th>
                <th >Course</th>
                <th >major</th>
                <th >class</th>
                <th >user name</th>
                <th >{{{ Lang::get("admin/users.email") }}}</th>
                <th >{{{ Lang::get("admin/admin.created_at") }}}</th>
                <th>{{{ Lang::get("admin/admin.action") }}}</th>
                <th class="col-md-1">chose</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent

    <script type="text/javascript" src="{{ URL::to('/js/jquery.datatables.js') }}"></script>
    
    <script src="{{{ asset('assets/admin/js/jquery.colorbox.js') }}}"></script>
    <script src="{{{ asset('assets/admin/js/datatables.fnReloadAjax.js') }}}"></script>
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            // $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
            oTable = $('#table').dataTable({
               "bServerSide": true,
                "sAjaxSource": "{{ URL::to('admin/users/data') }}",
                "columns": [
            {data: 'stu_code', name: 'stu_code'},    
            {data: 'fullname', name: 'fullname'},
            {data: 'course', name: 'course'},
            {data: 'major', name: 'major'},
            {data: 'class', name: 'class'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'actions', name: 'actions'},
             {data: 'check', name: 'check'}
            ],
            "fnDrawCallback": function (oSettings) {
                    $(".iframe").colorbox({
                        iframe: true,
                        width: "80%",
                        height: "80%",
                        onClosed: function () {
                            oTable.fnReloadAjax();
                        }
                    });
                }
            });
            
        });
    </script>
@stop
