@extends('web.home')
@section('auth')
<div class="row">
	<div class="col-lg-6" id="login" >
	    <form class="login-form" method="POST" action="{{route('login')}}">
	    	 @csrf
	      <div class="login-wrap">
	      	@if ($errors->has('username'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('username') }}</strong>
	            </div>
	        @endif
	        <div class="input-group">
	          <span class="input-group-addon"><i class="icon_profile"></i></span>
	          <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="username" required autofocus>
	        </div>
	        <div class="input-group">
	          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
	          <input type="password" name="password" required class="form-control" placeholder="Password">
	        @if ($errors->has('password'))
	            <div class="alert alert-danger" role="alert">
	                <strong>{{ $errors->first('password') }}</strong>
	            </div>
	        @endif
	        </div>
	        <div class="input-group" id="Remember" >
	        <label class="checkbox" >
	              <input type="checkbox" value="remember-me" {{ old('remember') ? 'checked' : '' }}> Remember me
	       			<button  class="btn btn-primary btn-md btn-block" type="submit">Login</button>
	        </label> 
	         <span >
	         	<a href="{{route('password.request')}}"> Forgot Password?</a>
	         	 <a class="btn btn-default" href="{{route('register')}}">Register Now</a>
			</span>
	        </div>
	      </div>
	    
	    <a  href="{{ ('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">
    		<span class="fa fa-facebook"></span> Sign in with facebook
  		</a>
  		<a  href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google">
    		<span class="fa fa-google"></span> Sign in with google
  		</a>
	    </form>

	</div>
</div>
@endsection