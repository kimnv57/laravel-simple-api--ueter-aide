@extends('admin/model')
@section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			Lang::get('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	action="@if (isset($notification)){{ URL::to('admin/notifications/' . $notification->id . '/edit') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
 			@if(isset($package))
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">package name</label>
					<div class="col-md-10">{{{ $package->name}}}
					</div>
				</div>
			</div>
			@endif

			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="password_confirmation">title</label>
					<div class="col-md-10">
						<input class="form-control" type="text" tabindex="1"
							placeholder="title"
							name="title" id="title" value="{{{ Input::old('title', isset($notification) ? $notification->title : null) }}}" />
						{!!$errors->first('title', '<label
							class="control-label" for="title">:message</label>')!!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<br>
			</div>

			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="password_confirmation">content</label>
					<div class="col-md-10">
						<input class="form-control" type="text" tabindex="1"
							placeholder="content"
							name="content" id="content" value="{{{ Input::old('content', isset($notification) ? $notification->content : null) }}}" />
						{!!$errors->first('content', '<label
							class="control-label" for="content">:message</label>')!!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<br>
			</div>

			@if(!isset($notification))
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="package_id">package </label>
					<div class="col-md-6">
						<select name="package_id" id="package_id" style="width: 100%;">
							@foreach ($packages as $package)
							<option value="{{{ $package->id }}}">{{{
								$package->name }}}</option> @endforeach
						</select> <span class="help-block">please chose package</span>
					</div>
				</div>
			</div>

			@endif
			

           
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
				    @if	(isset($notification))
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
