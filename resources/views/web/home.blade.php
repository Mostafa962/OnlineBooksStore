@extends('web.layouts.main')
@section('content')
	<div class="banner-bottom">
		<div class="container">
		@if(session()->has('ContactMessage'))
             <div class="alert alert-success">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <center><strong>{{session('ContactMessage')}}</strong></center>
             </div>
        @endif
        @if(session()->has('emailExisted'))
             <div class="alert alert-success">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <center><strong>{{session('emailExisted')}}</strong></center>
             </div>
        @endif
        @if(session()->has('userExisted'))
             <div class="alert alert-success">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <center><strong>{{session('userExisted')}}</strong></center>
             </div>
        @endif
		@if(session()->has('AccountUpdates'))
             <div class="alert alert-success">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <center><strong>{{session('AccountUpdates')}}</strong></center>
             </div>
        @endif

		<div class="banner-bottom-grids">
		<?php
			use App\Section;
			$sections = Section::withTrashed()->paginate(4);
		 ?>
		@foreach($sections as $section)
		@if(!$section->trashed())
			<a href="{{route('section_books',$section->id)}}">
				<div class="col-md-3 banner-bottom-grid-left">
					<div class="br-bm-gd-lt" style="background:url('{{url($section->section_cover)}}')no-repeat 0px 0px;">
						<div class="overlay">
							<div class="arrow-left"></div>
							<div class="rectangle"></div>
						</div>
						<div class="health-pos">
							<div class="health">
								<ul>
									<li><a href="#" style="margin-right: 30px">{{$section->section_name}}</a></li>
								</ul>
							</div>
							
							<div class="com-heart">
								<ul>
									<li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>120 Comments</a></li>
									<li><a href="#"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>12,536 Likes</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</a>
		@endif 
		@endforeach
				<div class="clearfix"> </div>
		</div>

			<div class="move-text">
				<div class="breaking_news">
					<h2>Register Now</h2>
				</div>
				<div class="marquee">
					<div class="marquee1"><a class="breaking" href="single.html">to Read More about Computer Science With over a hundred Books, Computers Books is the one of biggest Books Store in Middle East.It’s Free to read and download Books in PDF Format!</a></div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<script type="text/javascript" src="{{url('webFrontEnd/js/jquery.marquee.js')}}"></script>
				<script>
				  $('.marquee').marquee({ pauseOnHover: true });
				  //@ sourceURL=pen.js
				</script>
			</div>
			<!-- video-grids -->
		</div>
	</div>
<br>
@yield('auth')
@endsection
