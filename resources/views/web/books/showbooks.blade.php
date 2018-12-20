@extends('web.layouts.main')
@section('content')					
			

<div class="video-grids">
<div class="col-lg-12 video-grids-left">
	<div class="video-grids-left2">
		@if(isset($sections))				
		  	<div style="margin-right: 37.5%  "  class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
	            <ul class="nav navbar-nav cl-effect-18" id="cl-effect-18">
				@foreach($sections as $sec)
				<?php $id = $sec->id ?>
				<li class="{{(Request::segment(4)==$sec->id)?'act':''}}">
					<a  href="{{route('section_books',$sec->id)}}" >{{$sec->section_name}}</a>
				</li>
	        	@endforeach
	        	</ul>
	   			</div>
	    @endif<br>
<div class="course_demo1">
	<ul id="flexiselDemo1">	
 		@foreach($books as $book)
		<li>
			<div class="item">
				<img src="{{url($book->book_cover)}}" alt=" " class="img-responsive" height="100%" />
				<div class="floods-text">
					<a href="{{route('download',$book->id)}}">
						<button class="btn btn-default btn-block">
							<i class="fa fa-download"></i>Download
						</button>
					</a>
					<h3>{{$book->title}}
					 @foreach($book->authors as $auth)
					  	<span>{{$auth->fullname}} <label></label> </span>
					  @endforeach
					</h3><p>Edition : {{$book->edition}}</p>
				</div>
			</div>
		</li>
 		@endforeach
	</ul>
</div>
<!-- pop-up-box -->
<script type="text/javascript" src="{{url('webFrontEnd/js/modernizr.custom.min.js')}}"></script>    
<link href="{{url('webFrontEnd/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
<script src="{{url('webFrontEnd/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
<!--//pop-up-box -->
<script>
$(document).ready(function() {
$('.popup-with-zoom-anim').magnificPopup({
	type: 'inline',
	fixedContentPos: false,
	fixedBgPos: true,
	overflowY: 'auto',
	closeBtnInside: true,
	preloader: false,
	midClick: true,
	removalDelay: 300,
	mainClass: 'my-mfp-zoom-in'
});
																
});
</script>
<!-- requried-jsfiles-for owl -->
<script type="text/javascript">
$(window).load(function() {
$("#flexiselDemo1").flexisel({
	visibleItems: 3,
	animationSpeed: 1000,
	autoPlay: true,
	autoPlaySpeed: 3000,    		
	pauseOnHover: true,
	enableResponsiveBreakpoints: true,
	responsiveBreakpoints: { 
	portrait: { 
	changePoint:480,
	visibleItems: 1
	}, 
	landscape: { 
	changePoint:640,
	visibleItems: 2
	},
	tablet: { 
	changePoint:768,
	visibleItems: 3
	}
	}
	});

});
</script>
<script type="text/javascript" src="{{url('webFrontEnd/js/jquery.flexisel.js')}}"></script>
</div>
</div>
<div class="clearfix"> </div>
</div>
@endsection