<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TAMS | School - Login</title>

  <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">  

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6"> 
        <div class="card o-hidden border-0 shadow-lg my-4">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
             
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome to Teacher's Attendance Monitoring System!</h1>
                    <hr class="sidebar-divider my-2"> 
              
                <p class="mb-2">School Login </p> 
                  </div> 
                    <form class="user" role="form" method="POST" action="{{ url('/school/login') }}">
                        {{ csrf_field() }}
                        
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input type="email" class="form-control form-control-user" id="email"  name="email" value="{{ old('email') }}" autofocus aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        {{ $errors->first('email') }} 
                                    </span>
                                @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        {{ $errors->first('password') }} 
                                    </span>
                                @endif
                    </div> 
                    <button type="submit"  class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                    <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                    <hr>
                    <a class="btn btn-success btn-user btn-block" href="{{ route('admin.login') }}">
                        Go to Admin Login  &rarr;
                    </a>
                    <a class="btn btn-warning btn-user btn-block" href="{{ route('index') }}">
                        Back
                    </a>
                  </form>
                
                 
                </div>
              </div>
            </div>
          </div>
        </div> 

      </div>

    </div>
    <footer class="sticky-footer ">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="text-gray-100">Designed & developed by:
            Directorate of Information Technology, Electronics & Communication (DITEC)</span>
          </div>
        </div>
      </footer>
  </div>

  <!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script> 
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>   

  <!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>    

  <!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>   

</body>

</html>
