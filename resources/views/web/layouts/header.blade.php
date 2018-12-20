<!DOCTYPE HTML>
<html>
<head>
<title>Computers Books</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trendy Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{url('webFrontEnd/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('webFrontEnd/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="{{url('webFrontEnd/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
<!-- import some admin panel frontend that i need in website -->
 <link href="{{url('/adminFrontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{url('/adminFrontEnd/css/elegant-icons-style.css')}}" rel="stylesheet" />
 <link href="{{url('/adminFrontEnd/css/font-awesome.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{url('adminFrontEnd/css/elegant-icons-style.css')}}">

</head>
<body>
<!-- banner -->
	<div class="banner">
		<div class="banner-info">
			<div class="container">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<div class="logo">
							<a class="navbar-brand" href="{{route('home')}}"><span>C</span>omputers Books</a>
						</div>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav cl-effect-18" id="cl-effect-18">
							<li class="{{(Request::segment(1)==='home' &&Request::segment(2)===null||Request::segment(2)==='login'||Request::segment(2)==='register')?'act':''}}"><a href="{{route('home')}}" class="{{(Request::segment(1)==='home' &&Request::segment(2)===null||Request::segment(2)==='login'||Request::segment(2)==='register')?'effect1 active':''}}">Home</a></li>
							<li class="{{(Request::segment(2)==='show')?'act':''}}"> <a href="{{route('books')}}"  class="{{(Request::segment(2)==='show')?'effect1 active':''}}">All Books</a></li>
							<li class="{{(Request::segment(2)==='new')?'act':''}}"><a href="{{route('newbooks')}}" class="{{(Request::segment(2)==='new')?'effect1 active':''}}">New Releases</a></li>
							@if(userWeb()->check())
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								 {{userWeb()->user()->username}}<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="{{route('settings',userWeb()->user()->id)}}">Settings</a></li>
								  <li><a href="{{route('userlogout')}}">logout</a></li>
								</ul>
							</li>
							@else
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								  My Account <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="{{route('login')}}">Sign in</a></li>
								  <li><a href="{{route('register')}}">Sign up</a></li>
								   <li><a href="{{route('adminLogin')}}">Admin?</a></li>
								</ul>
							</li>
							@endif
						</ul>
					</div><!-- /.navbar-collapse -->	
				</nav>
				<!--banner-Slider-->
					<script src="{{url('webFrontEndjs/responsiveslides.min.js')}}"></script>
						<script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  // Slideshow 4
							  $("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav:true,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
							  });

							});	
						</script>
					<div  id="top" class="callbacks_container">
						<ul class="rslides" id="slider3">
							<li>
								<div class="banner-info-slider">
									<ul>
										<li><a><?php date_default_timezone_set('Egypt'); echo date("h:i:s", time()); ?></a></li>
										<li><?php echo date('Y-M-d')?></li>
									</ul>
									<h3>Read More </h3>
									<p>about Computer Science and Software Engineering.<span>By <i><a href="">Mostafa Elgebaly</a></i>and<i><a href="">W3LAYOUTS</a></i></span></p>
								</div>
							</li>
						</ul>
					</div>
			</div>
		</div>
	</div>