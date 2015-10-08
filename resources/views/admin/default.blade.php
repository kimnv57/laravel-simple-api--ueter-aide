@extends('default')

{{-- Web site Title --}}
@section('title')
    Administration :: @parent
@endsection

{{-- Styles --}}
@section('styles')
    
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/colorbox.css')}}">

@endsection

{{-- Sidebar --}}
@section('content')
@endsection

{{-- Scripts --}}
@section('scripts')
    <script src="{{{ asset('assets/admin/js/jquery.colorbox.js') }}}"></script>
    <script>
		$(document).ready(function(){
			
			$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
			
		});
	</script>
    {{-- Default admin scripts--}}


@endsection
