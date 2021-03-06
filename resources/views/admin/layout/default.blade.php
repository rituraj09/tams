<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TAMS | Admin</title>

  <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css"> 

  <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('assets/css/addon.css')}}" rel="stylesheet" type="text/css"> 
   
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <style>
 .btn-group-xs > .btn, .btn-xs {
  padding: .20rem .2rem;
  font-size: 11px;
  line-height: .5;
  border-radius: .2rem;
}
.table
{
  font-size:13px !important;
}
   .blinking {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}


</style>
 
</head>

<body id="page-top" onload="onload()">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  
    @include('admin.layout.common.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
    @include('admin.layout.common.top_nav')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid"> 
            @yield('content') 
        </div>
        <!-- /.container-fluid -->

        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container">
         
          <div class="copyright text-center ">
            <span>Designed & developed by:
            Directorate of Information Technology, Electronics & Communication (DITEC)
            </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->



  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ url('/admin/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>  
      <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
        </div>
      </div>
    </div>
  </div>

  @include('admin.json.script')
  <!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script> 
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>  

  <!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>   

  <!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>  

  <!-- Page level plugins -->
<script src="{{ asset('assets/vendor/chart.js/Chart.min.js')}}"></script>  

  <!-- Page level custom scripts -->
<script src="{{ asset('assets/js/demo/chart-area-demo.js')}}"></script>  
<script src="{{ asset('assets/js/demo/chart-pie-demo.js')}}"></script>  


  <!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>  
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>  

  <!-- Page level custom scripts -->
<script src="{{ asset('assets/js/demo/datatables-demo.js')}}"></script>  
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>
</body>

</html>
