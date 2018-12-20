@extends('web.home')
@section('auth')
<div class="row">
	<div class="col-lg-6" id="login" >
		<div class="card-header" style="color: #fff;"><h3>{{ __('Reset Password') }}</h3></div>

	    <form class="login-form" method="POST" action="{{ route('password.email') }}">
	   @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->has('email'))
            <div class="alert alert-danger " role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
	    	 @csrf
	      <div class="login-wrap">
	        <div class="input-group col-lg-8">
	          <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                
	        </div>
	        </div>
	          <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
                 </div>
	      </div>
	    </form>
	</div>
</div>
@endsection