@extends('default')
@section('styles')
@stop

@section('content')
<div>
	<img src="{{URL::to('images/news.png')}}" class="newscaptain">
	<div class="capstain">
		<h1>Giới thiệu - USETER-AIDE</h1>
	</div>
</div>
<div class="container">
	<div row>
		<div class="col-md-5">
			<img src="{{URL::to('images/news1.jpg')}}">
		</div>
		<div class="col-md-7">
			<p>Không nằm ẩn mình trong con ngõ nhỏ, cũng không chọn những khu phố quá ồn ào, nhà hàng MasterChef hài hòa như một nhấn nhá thanh lịch lên phố Hàng Tre.Hướng tới hình ảnh tinh tế, sang trọng và mới lạ, không gian tại MasterChef được thiết kế và bài trí nội thất như một trường quay MasterChef thu nhỏ. Sự phối trộn độc đáo giữa tông vàng cam ấm áp trên nền xanh coban hiện đại, đem đến cho thực khách một không gian vừa thân quen vừa mới lạ đến bất ngờ.</p>
		</div>
	</div>
	
</div>
 @stop

 @section('scripts')

@stop