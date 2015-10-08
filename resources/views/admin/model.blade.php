<!DOCTYPE html>

<html lang="en">

<head id="Starter-Site">

<meta charset="UTF-8">

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Administration</title>
<!--  Mobile Viewport Fix -->
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<!-- CSS -->
<link href="{{{ asset('assets/admin/css/bootstrap.min.css') }}}"
	rel="stylesheet" type="text/css">
<link
	href="{{{ asset('assets/admin/css/jquery-ui-1.10.3.custom.css') }}}"
	rel="stylesheet" type="text/css">
<link href="{{{ asset('assets/admin/css/colorbox.css') }}}"
	rel="stylesheet) }}}" type="text/css">
<link href="{{{ asset('assets/admin/css/jquery.multiselect.css') }}}"
	rel="stylesheet" type="text/css">
<link href="{{{ asset('assets/admin/css/select2.css') }}}"
	rel="stylesheet" type="text/css">
<link
	href="{{asset('assets/admin/font-awesome-4.2.0/css/font-awesome.min.css')}}"
	rel="stylesheet" type="text/css">
<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!-- start: Favicon and Touch Icons -->
<link rel="shortcut icon"
	href="{{{ asset('assets/admin/ico/favicon.ico') }}}">
<!-- end: Favicon and Touch Icons -->
@yield('styles')
</head>
<body>
	<!-- Container -->
	<div class="container">
		<br>
		<div class="pull-right">
			<button class="btn btn-primary btn-sm close_popup">
				<span class="glyphicon glyphicon-backward"></span> {{{
				trans('admin/admin.back') }}}
			</button>
		</div>
		<br>
		<!-- Content -->
		@yield('content')
		<!-- ./ content -->
	</div>
	<script src="{{{ asset('assets/admin/js/jquery-2.1.1.min.js') }}}"></script>
	<script src="{{{ asset('assets/admin/js/bootstrap.min.js') }}}"></script>
	<script src="{{  asset('assets/admin/js/select2.js') }}"></script>
	
	@yield('scripts')
</body>
</html>