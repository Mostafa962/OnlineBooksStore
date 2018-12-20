<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <link rel="shortcut icon" href="{{url('adminFrontEnd/img/favicon.png')}}">
  <title>{{trans('Admin.login')}}</title>
  <!-- Bootstrap CSS -->
  <link href="{{url('adminFrontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{url('adminFrontEnd/css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{url('adminFrontEnd/css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{url('adminFrontEnd/css/font-awesome.css')}}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{url('adminFrontEnd/css/style.css')}}" rel="stylesheet">
  <link href="{{url('adminFrontEnd/css/style-responsive.css')}}" rel="stylesheet" />
</head>

<body class="login-img3-body">

  <div class="container">
    @yield('content')
  </div>
</body>
</html>
