@extends('admin/model')
 @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{
			Lang::get("admin/modal.general") }}</a></li>
</ul>
<form id="deleteForm" class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/delete') }}@endif"
	autocomplete="off">

	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> <input
		type="hidden" name="id" value="{{ $user->id }}" />
	<div class="form-group">
		<div class="controls">
			{{ Lang::get("admin/modal.delete_message") }}<br>
			<element class="btn btn-warning btn-sm close_popup">
			<span class="glyphicon glyphicon-ban-circle"></span> {{
			Lang::get("admin/modal.cancel") }}</element>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span> {{
				Lang::get("admin/modal.delete") }}
			</button>
		</div>
	</div>
</form>
@stop

@section('scripts')

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