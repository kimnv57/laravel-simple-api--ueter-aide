@extends('admin/model')
@section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			Lang::get('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
 @if(isset($user))
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						Lang::get('admin/users.name') }}</label>
					<div class="col-md-10">{{{ $user->username}}}
					</div>
				</div>
			</div>
@endif

 @if(!isset($user))
 			
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="username">username</label>
                    <div class="col-md-10">
                        <input class="form-control" type="username" tabindex="4"
                               placeholder="{{ Lang::get('admin/users.username') }}" name="username"
                               id="username"
                               value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}" />
                        {!! $errors->first('username', '<label class="control-label"
                                                            for="username">:message</label>')!!}
                    </div>
                </div>
            </div>
			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="email">{{
						Lang::get('admin/users.email') }}</label>
					<div class="col-md-10">
						<input class="form-control" type="email" tabindex="4"
							placeholder="{{ Lang::get('admin/users.email') }}" name="email"
							id="email"
							value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
						{!! $errors->first('email', '<label class="control-label"
							for="email">:message</label>')!!}
					</div>
				</div>
			</div>
			@endif
			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="password">{{
						Lang::get('admin/users.password') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="5"
							placeholder="{{ Lang::get('admin/users.password') }}"
							type="password" name="password" id="password" value="" />
						{!!$errors->first('password', '<label class="control-label"
							for="password">:message</label>')!!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('password_confirmation') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="password_confirmation">{{
						Lang::get('admin/users.password_confirmation') }}</label>
					<div class="col-md-10">
						<input class="form-control" type="password" tabindex="6"
							placeholder="{{ Lang::get('admin/users.password_confirmation') }}"
							name="password_confirmation" id="password_confirmation" value="" />
						{!!$errors->first('password_confirmation', '<label
							class="control-label" for="password_confirmation">:message</label>')!!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<br>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="roles">{{
						Lang::get('admin/users.roles') }}</label>
					<div class="col-md-6">
						<select name="admin" id="roles" style="width: 100%;">

							<option value="1">admin</option>
							<option value="0" selected>student</option>
						</select> <span class="help-block">please chose role</span>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="fullname">full name</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="full name" type="text"
							name="fullname" id="fullname"
							value="{{{ Input::old('fullname', isset($user) ? $user->fullname : null) }}}">
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="stu_code">student code</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="student code" type="number"
							name="stu_code" id="stu_code"
							value="{{{ Input::old('stu_code', isset($user) ? $user->stu_code : null) }}}">
							{!!$errors->first('stu_code', '<label
							class="control-label" for="stu_code">:message</label>')!!}
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="course">course</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="course" type="text"
							name="course" id="course"
							value="{{{ Input::old('course', isset($user) ? $user->course : null) }}}">
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="major">major</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="major" type="number"
							name="major" id="major"
							value="{{{ Input::old('major', isset($user) ? $user->major : null) }}}">
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="fullname">class</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="class" type="text"
							name="class" id="class"
							value="{{{ Input::old('class', isset($user) ? $user->class : null) }}}">
					</div>
				</div>
			</div>
           
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				Lang::get("admin/modal.cancel") }}
			</button>
			<button type="reset" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-remove-circle"></span> {{
				Lang::get("admin/modal.reset") }}
			</button>
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				    @if	(isset($user))
				        {{ Lang::get("admin/modal.edit") }}
				    @else
				        {{Lang::get("admin/modal.create") }} 
				    @endif
			</button>
		</div>
	</div>
</form>
@stop
@section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});
</script>
<script type="text/javascript">
	$(function() {
		$('form').submit(function(event) {
			event.preventDefault();
			var form = $(this);
			if (form.attr('id') == '' || form.attr('id') != 'fupload'){
				$.ajax({
					  type : form.attr('method'),
					  url : form.attr('action'),
					  data : form.serialize()
					  }).success(function() {
						  setTimeout(function() {
							  parent.$.colorbox.close();
							  }, 10);
					}).fail(function(jqXHR, textStatus, errorThrown) {
	                    // Optionally alert the user of an error here...
	                    alert("fail");
	                    var textResponse = jqXHR.responseText;
	                    var alertText = "One of the following conditions is not met:\n\n";
	                    var jsonResponse = jQuery.parseJSON(textResponse);
	                    $.each(jsonResponse, function(n, elem) {
	                        alertText = alertText + elem + "\n";
	                    });
	                    alert(alertText);
	                });
				}
			else{
				var formData = new FormData(this);
				$.ajax({
					  type : form.attr('method'),
					  url : form.attr('action'),
					  data : formData,
					  mimeType:"multipart/form-data",
					  contentType: false,
					  cache: false,
					  processData:false
				}).success(function() {
					  setTimeout(function() {
						  parent.$.colorbox.close();
						  }, 10);
				}).fail(function(jqXHR, textStatus, errorThrown) {
                    // Optionally alert the user of an error here...
                    var textResponse = jqXHR.responseText;
                    var alertText = "One of the following conditions is not met:\n\n";
                    var jsonResponse = jQuery.parseJSON(textResponse);
                    $.each(jsonResponse, function(n, elem) {
                        alertText = alertText + elem + "\n";
                    });
                    alert(alertText);
                });
			};
		});
		$('.close_popup').click(function() {
			parent.$.colorbox.close()
		});
	});
</script>
@stop
