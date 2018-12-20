@extends('web.home')
@section('auth')
	<div class="row">
	<div class="col-lg-6" id="login" >
	    <form class="login-form" method="POST" action="{{route('update',$userData->id)}}">
	    	 @csrf
	      <div class="login-wrap">
	      	<!-- name -->
	      	<div class="form-group">
	      		  <label  for="name" class="col-md-4 col-form-label text-md-left">{{ __('Full Name') }}</label>
	          <input type="text" name="name"  value="{{$userData->name}}" class="form-control" required="required" placeholder="Fullname" minlength="6" maxlength="30" autofocus>
	        @if ($errors->has('name'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('name') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- username -->
	        <div class="form-group">
	        	  <label  for="username" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>
	          <input type="text" class="form-control" name="username"  value="{{ $userData->username }}" placeholder="username"  minlength="6"  autofocus required="required">
	        @if ($errors->has('username'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('username') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- email -->
	          <label  for="email" class="col-lg-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
	        <div class="form-group">
	          <input type="email" name="email"  value="{{ $userData->email }}" class="form-control" placeholder="Email" required="required" autofocus>
	        @if ($errors->has('email'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('email') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- password -->
	        <div class="form-group">
	          <input type="password" name="password" minlength="6" class="form-control" placeholder="Password">
	        @if ($errors->has('password'))
	            <div class="alert alert-danger" role="alert">
	                <strong>{{ $errors->first('password') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- confirmpassword -->
	        <div class="form-group">
	          <input type="password" name="password_confirmation"  minlength="6" class="form-control"  placeholder="Confirm Password" autofocus>
	        @if ($errors->has('passwordConfirm'))
	            <div class="alert alert-danger"  role="alert">
	                <strong>{{ $errors->first('passwordConfirm') }}</strong>
	            </div>
	        @endif
	        </div>
	        <!-- remember me -->
	        </div>
	        <button class="btn btn-info btn-md " type="submit">Save</button><br>
	      </div>
	    </form>
	</div>
</div>
@endsection