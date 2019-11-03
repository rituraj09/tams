<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TAMS | School</title>

  <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
 
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css"> 

  <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('assets/css/addon.css')}}" rel="stylesheet" type="text/css"> 
  
    <link href="{{ asset('dist/css/bootstrap/zebra_datepicker.css') }}" rel="stylesheet" rel="stylesheet">
    <link href="{{ asset('dist/css/bootstrap/zebra_datepicker.min.css') }}" rel="stylesheet" rel="stylesheet">

 <style>
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
  
    @include('school.layout.common.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
  
        <!-- Topbar -->
    @include('school.layout.common.top_nav')
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
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; DITEC, Govt. of Assam 2019</span>
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
          <a class="btn btn-primary" href="{{ url('/school/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>  
      <form id="logout-form" action="{{ url('/school/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
        </div>
      </div>
    </div>
  </div> 
  <!-- Bootstrap core JavaScript-->
  
  @include('school.json.script')
<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script> 
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>  

  <!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>   

  <!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>  

  <!-- Page level plugins -->
<script src="{{ asset('assets/vendor/chart.js/Chart.min.js')}}"></script>  

  <!-- Page level custom scripts -->
   


  <!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>  
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>  

  <!-- Page level custom scripts -->
<script src="{{ asset('assets/js/demo/datatables-demo.js')}}"></script>  


<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
function startTime() {
  var today = new Date();
  var dd = today.getDate();
  var mnth = today.getMonth() + 1;
  var y = today.getFullYear();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s); 
  var ap = "AM";
   if (h   > 11) { ap = "PM";}
   if (h   > 12) { h = h - 12; }
   if (h   == 0) { h = 12;       }
   if (h   < 10) { h   = "0" + h;   } 
   var timeString = h + ':' + m + ':' + s + " " + ap;

  document.getElementById('clock').innerHTML =timeString;
  var dd = ("0" + today.getDate()).slice(-2);
  var mm= ("0" + (today.getMonth() + 1)).slice(-2)
  var Y = today.getFullYear();   
  var todates = dd + '-' + mm + '-' + Y;
  document.getElementById('todate').innerHTML = todates; 



  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</body>

</html>
