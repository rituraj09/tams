<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TAMS | Teacher Attendance System</title>

  <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">  

</head>


<body id="page-top">

  <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="sidebar-brand-text mx-3">TAMS </div>
            </a>
            <hr class="sidebar-divider my-0"> 
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('index') }}"> 
                <span>Teacher's Attendance Monitoring System</span></a>
            </li>
            
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="row justify-content-center">

                    <div class="col-xl-4 col-lg-4 col-md-4"> 
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="card shadow  ">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">School Login</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('assets/img/teachers.svg')}}" alt="">
                                            </div>
                                            
                                            <a   rel="nofollow" href="{{ route('school.login') }}" >Go to School login  &rarr;</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4"> 
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="card shadow  ">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Admin Login</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('assets/img/admin.svg')}}" alt="">
                                            </div>
                                                           <a  rel="nofollow" href="{{ route('admin.login') }}" >Go to Admin login &rarr;</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; DITEC, Govt. of Assam 2019</span>
                </div>
                </div>
            </footer>
        </div>
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
