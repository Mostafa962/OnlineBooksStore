@extends('admin.layouts.adminAuthLayout')
@section('content')
    <form class="login-form" action="{{route('verifiemail')}}" method="POST" >
        @if(session()->has('success'))
         <div class="alert alert-success">
             <strong>{{session('success')}}</strong>
         </div>
        @elseif(session()->has('failed'))
          <div class="alert alert-danger">
             <strong>{{session('failed')}}</strong>
         </div>
         @endif
      {!! csrf_field()!!}
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Send Mail</button>
        <a href="{{url(adminURL('login'))}}">Sign in</a>
      </div>
    </form>
@endsection