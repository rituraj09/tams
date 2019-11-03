<script>  
   
     
function onload()
{
  startTime();
  getpie();
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


 
</script>

