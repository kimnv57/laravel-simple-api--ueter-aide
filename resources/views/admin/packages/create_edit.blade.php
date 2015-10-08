@extends('admin/model')
@section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			Lang::get('admin/modal.general') }}}</a></li>
</ul>


<form class="form-horizontal" action="@if (isset($package)){{ URL::to('admin/packages/' . $package->id . '/edit') }}@endif" method="post" autocomplete="off">
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						Lang::get('admin/dishes.name') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{ Lang::get('admin/dishes.name') }}" type="text"
							name="name" id="name"
							value="{{{ Input::old('name') }}}">
							{!! $errors->first('name', '<label class="control-label"
							for="email">:message</label>')!!}
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">content</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="content" type="text"
							name="content" id="content"
							value="{{{ Input::old('content') }}}">
							{!! $errors->first('content', '<label class="control-label"
							for="email">:message</label>')!!}
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
