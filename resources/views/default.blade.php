<!DOCTYPE html>
<html lang="en">
     <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>@section('title') ueter aide @show</title>
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::to('css/mystyle.css')}}">
     


     <!-- <link href="{{ asset('/css/all.css') }}" rel="stylesheet"> -->
     @yield('styles')
     

     </head>
  <body>
  @include('partials.nav')
  <div>
  <div class="container">
    @yield('content')
  </div>
    
  </div>
  <div class="my_footer">
      @include('partials.footer-design')
  </div>
  </body>
  
  
<script src="{{ URL::to('/js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
<script>
$(function(){

    $('#loginform').submit(function(event) {
      event.preventDefault();
      var form = $(this);
      $.ajax({
          type : form.attr('method'),
          url : form.attr('action'),
          data : form.serialize()
          }).success(function() {
            window.parent.location.replace("/");
        })
          .fail(function(jqXHR, textStatus, errorThrown) {
              // Optionally alert the user of an error here...
              var textResponse = jqXHR.responseText;
              var alertText = "";
              var jsonResponse = jQuery.parseJSON(textResponse);
              $.each(jsonResponse, function(n, elem) {
                  alertText = alertText + elem + "<br>";
              });
              $(".loi").html('');
              $("<div>").attr("class","alert").attr("class","alert-danger").appendTo($(".loi"));
              $("<strong>").html("One of the following conditions is not met:").appendTo($(".alert-danger"));
              $("<br>").appendTo($(".alert-danger"));
              $("<strong>").html(alertText).appendTo($(".alert-danger"));
          });
        });
});
</script>
@yield('scripts')


</html>