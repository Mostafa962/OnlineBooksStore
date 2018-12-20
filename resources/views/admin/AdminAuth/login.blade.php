@extends('admin.layouts.adminAuthLayout')
@section('content')
    <form class="login-form" action="{{route('adminLogin')}}" method="POST" >
        @if(session()->has('error'))
         <div class="alert alert-danger">
             {{session('error')}}
         </div>
         @endif
      {!! csrf_field()!!}
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" name="rememberme" value="remember-me"> Remember me
                <span class="pull-right"> <a href="{{route('forgotPass')}}"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
@endsection