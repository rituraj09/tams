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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css"> 

  <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('assets/css/addon.css')}}" rel="stylesheet" type="text/css"> 
  
    <link href="{{ asset('dist/css/bootstrap/zebra_datepicker.css') }}" rel="stylesheet" rel="stylesheet">
    <link href="{{ asset('dist/css/bootstrap/zebra_datepicker.min.css') }}" rel="stylesheet" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
 <style>
 .btn-group-xs > .btn, .btn-xs {
  padding: .60rem .8rem;
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
       <a  class="btn btn-primary"  href="{{ route('school.logout') }}">Logout</a>
         
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
<script src="{{ asset('assets/js/script.js')}}"></script>  


<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 function startTime() {
  var st = srvTime(); 
  var today = new Date();
  var dd = today.getDate();
  var mnth = today.getMonth() + 1;
  var y = today.getFullYear();  
  var dd = ("0" + today.getDate()).slice(-2);
  var mm= ("0" + (today.getMonth() + 1)).slice(-2)
  var Y = today.getFullYear();   
  var todates = dd + '-' + mm + '-' + Y;
  document.getElementById('todate').innerHTML = todates; 
  var h = checkTime(today.getHours()); 
  var m = checkTime(today.getMinutes());
  var s = checkTime(today.getSeconds());   

  
  if(h>=14 )
  {
    $(".palybtn").hide();
    $(".over").show();
  }
  else
  {    
    $(".over").hide();
    $(".palybtn").show();
  }
  var t = setTimeout(startTime, 500);
} 

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
} 


var xmlHttp;
function srvTime(){
    try {
        //FF, Opera, Safari, Chrome
        xmlHttp = new XMLHttpRequest();
    }
    catch (err1) {
        //IE
        try {
            xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch (err2) {
            try {
                xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch (eerr3) {
                //AJAX not supported, use CPU time.
                alert("AJAX not supported");
            }
        }
    }
    xmlHttp.open('HEAD',window.location.href.toString(),false);
    xmlHttp.setRequestHeader("Content-Type", "text/html");
    xmlHttp.send('');
    return xmlHttp.getResponseHeader("Date");
}
function gettime() {
  var st = srvTime(); 
  var today = new Date(st);  
  var dd = ("0" + today.getDate()).slice(-2);
  var mm= ("0" + (today.getMonth() + 1)).slice(-2)
  var Y = today.getFullYear();    
  var h = checkTime(today.getHours());  
  var midday = "AM";
  midday = (h >= 12) ? "PM" : "AM"; /* assigning AM/PM */
  hrs = (h == 0) ? 12 : ((h > 12) ? (h - 12): h); /* assigning hour in 12-hour format */ 
  var h = checkTime(hrs);
  var m = checkTime(today.getMinutes());
  var s = checkTime(today.getSeconds());   
  var clck = h+m+s+dd+midday; 
  return clck;
} 
</script>
</body>

</html>
