@extends('web.home')
@section('auth')
<div class="row">
	<div class="col-lg-6" id="login" >
	    <form class="login-form" method="POST" action="{{route('register')}}">
	    	 @csrf
	      <div class="login-wrap">
	      	<!-- name -->
	      	<div class="form-group">
	          <input type="text" name="name"  value="{{ old('name') }}" class="form-control" required="required" placeholder="Fullname" minlength="6" maxlength="30" autofocus>
	        @if ($errors->has('name'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('name') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- username -->
	        <div class="form-group">
	          <input type="text" class="form-control" name="username"  value="{{ old('username') }}" placeholder="username"  minlength="6"  autofocus required="required">
	        @if ($errors->has('username'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('username') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- email -->
	        <div class="form-group">
	          <input type="email" name="email"  value="{{ old('email') }}" class="form-control" placeholder="Email" required="required" autofocus>
	        @if ($errors->has('email'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('email') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- password -->
	        <div class="form-group">
	          <input type="password" name="password" minlength="6" class="form-control" required="required"  placeholder="Password">
	        @if ($errors->has('password'))
	            <div class="alert alert-danger" role="alert">
	                <strong>{{ $errors->first('password') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- confirmpassword -->
	        <div class="form-group">
	          <input type="password" name="password_confirmation"  minlength="6" class="form-control" required="required" placeholder="Confirm Password" autofocus>
	        @if ($errors->has('passwordConfirm'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('passwordConfirm') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- remember me -->
	        </div>
	        <button class="btn btn-primary btn-md btn-block " type="submit">Register</button><br>
	         <span >
	         	 <a style="margin-bottom: 15px" class="btn btn-default" href="{{route('login')}}">login</a>
			</span>
				    <a class="btn btn-block btn-social btn-facebook">
    		<span class="fa fa-facebook"></span> Sign in with facebook
  		</a>
  		<a class="btn btn-block btn-social btn-google">
    		<span class="fa fa-google"></span> Sign in with google
  		</a>
	      </div>

	    </form>
	</div>
</div>
@endsection