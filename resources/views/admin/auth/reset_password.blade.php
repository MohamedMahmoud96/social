<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{trans('admin.forgot_password')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('/adminPanel')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/adminPanel')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('/adminPanel')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/adminPanel')}}/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('/adminPanel')}}/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{trans('admin.forgot_password')}}</p>
    @if(session()->has('info'))
    <div class='alert alert-info'>
       <h2>{{session('info')}}</h2>
    </div>
    @endif
     @if($errors->all())
     <div class='alert alert-danger'>
     	@foreach($errors->all() as $error)
     	<li>{{$error}}</li>
     	@endforeach
     	</div>
     @endif
    <form action="{{route('reset_password', ['token'=> $data->token])}}" method="post">
      @csrf
      @method('post')
     
              
	   <div class="form-group has-feedback">
	     <input type="password" class="form-control" placeholder="Password" name='password'>
	     <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	   </div>

	     <div class="form-group has-feedback invalid">
	     <input type="password" class="form-control is-invalid" placeholder="Confirmation Password" name='password_confirmation'>
	     <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	   </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
      
         
        
        <!-- /.col -->
      </div>
    </form>
  </div>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{url('/adminPanel')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/adminPanel')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->


</body>
</html>
