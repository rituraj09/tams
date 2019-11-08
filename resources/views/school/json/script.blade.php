<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> 
        <div id="loader">
        <center>
        <img src="{{ asset('assets/img/loader.gif')}}">
        </center>
        </div>
        <div id="listdata">
        <div class="form-group">
            <div class="row"> 
               <label class="col-md-4 control-label">
               Biometric Code:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_code" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Name:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="fname" class="text-primary"></i> 
                <i id="lname" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Email:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_email" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Mobile:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_mobile" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Address:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_add" class="text-primary"></i><br>
                <i id="l_pin" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Employee Type:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_type" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Date of Birth:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_dob" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Joining  Date:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_doj" class="text-primary"></i>
               </label>   
            </div>
            <div class="row"> 
               <label class="col-md-4 control-label">
               Retirement Date:
               </label>  
                <label class="control-label col-md-5"> 
                <i id="l_dor" class="text-primary"></i>
               </label>   
            </div>
        </div> 
        </div>
        </div>
      </div>
    </div>
  </div> 
<script>      
function onload()
{ 
 
  startTime();
  getpie();   
}  
   function confirmChange() {
    var result = confirm('Are you sure, you want to Update?'); 
    if (result) {
            return true;
        } else {
            return false;
    }
}
function confirmSubmit() {
    var result = confirm('Are you sure, you want to Save?'); 
    if (result) {
            return true;
        } else {
            return false;
    }
}  
function confirmDelete() {
    var result = confirm('Are you sure, you want to Delete?'); 
    if (result) {
            return true;
        } else {
            return false;
    }
}  
var isShift = false;
var seperator = "-";
function DateFormat(txt, keyCode) {
    if (keyCode == 16)
        isShift = true;
    //Validate that its Numeric
    if (((keyCode >= 48 && keyCode <= 57) || keyCode == 8 ||
         keyCode <= 37 || keyCode <= 39 ||
         (keyCode >= 96 && keyCode <= 105)) && isShift == false) {
        if ((txt.value.length == 2 || txt.value.length == 5) && keyCode != 8) {
            txt.value += seperator;
        }
        return true;
    }
    else {
        return false;
    }
}
function ValidateDate(txt, keyCode) {  
    if(txt.value !="")
    {
        var dateString  = txt.value  
        var dateParts = dateString.split("-");
        var mnth =dateParts[1]   ;
        var s_date =dateParts[2] + '/'+ mnth +'/'+ dateParts[0];
        var date =  new Date(s_date);  
        if(date == 'Invalid Date')
        {
                txt.value= '';
                alert("Invalid Date");
                txt.focus();
                return false;
        }
        else
        {
            return true; 
        }
    }
     
};  

    function numeric(txt, keyCode) {
    if (keyCode == 16)
        isShift = true;
    //Validate that its Numeric
    if (((keyCode >= 48 && keyCode <= 57) || keyCode == 8 ||
         keyCode <= 37 || keyCode <= 39 ||
         (keyCode >= 96 && keyCode <= 105)) && isShift == false) {
         
        return true;
    }
    else {
        return false;
    }
} 
function getpie()  {  
   // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var p = document.getElementById("p_fld").value;
var a = document.getElementById("a_fld").value;
var l = document.getElementById("l_fld").value;
var m = document.getElementById("m_fld").value;
 
var ctx = document.getElementById("myPie");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Present", "Absent", "On Leave", 'MIS'],
    datasets: [{
      data: [p,a,l,m],
      backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc' , '#f9b755'],
      hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf', '#e09e3d'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
}

function getdetails(id)  {  
    
    $("#loader").show(); 
    $("#listdata").hide();  
    url = data = ''; 
    data = '&id='+id; 
    url  = "{{ route('get_employee_info') }}"; 
    $.ajax({ 
        data : data,
        url  : url,
        type : 'get', 
        success:function(data) {     
            
            $("#l_code").html(data.unique_id); 
            $("#fname").html(data.first_name); 
            $("#lname").html(data.last_name); 
            $("#l_email").html(data.email); 
            $("#l_mobile").html(data.phone); 
            $("#l_add").html(data.address); 
            $("#l_pin").html(data.pincode); 
            $("#l_type").html(data.emp_type); 
            $("#l_dob").html(getDateFormat(data.dob)); 
            $("#l_doj").html(getDateFormat(data.doj)); 
            $("#l_dor").html(getDateFormat(data.dor)); 
            $("#loader").hide(); 
            $("#listdata").show();  
        },
        error:function(data){ 
        }
    }); 
}
function getDateFormat(date)
{
    if(date){
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; 
        var date = new Date(date);
        var dd = date.getDate(); 
        var mm =months[date.getMonth()]; 
        var yyyy = date.getFullYear(); 
        var output = (dd<10 ? '0' : '') + dd + "-" 
                        +  mm+ '-' + yyyy; 
        return output;
    }
    else
    {
        return "";
    }
   
} 
</script>


