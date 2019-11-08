<script>  
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
function onload()
{ 
  getpie();
  getline();
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
        type: 'doughnut',
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
function getline() {
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#858796';

      function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
          s = '',
          toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
          };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
          s[1] = s[1] || '';
          s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
      }

      // Area Chart Example
       
      try { 
      var d1 = document.getElementById("p_d1").value;
      }
      catch(err) { 
        var d1 = 'NA';
      }
      try { 
      var d2 = document.getElementById("p_d2").value;
      }
      catch(err) { 
        var d2 = 'NA';
      }
      try { 
      var d3 = document.getElementById("p_d3").value;
      }
      catch(err) { 
        var d3 = 'NA';
      }
      try { 
      var d4 = document.getElementById("p_d4").value;
      }
      catch(err) { 
        var d4 = 'NA';
      }
      try { 
      var d5 = document.getElementById("p_d5").value;
      }
      catch(err) { 
        var d5 = 'NA';
      } 


      try { 
      var v1 = document.getElementById("p_v1").value;
      }
      catch(err) { 
        var v1 = 'NA';
      } 
       try { 
      var v2 = document.getElementById("p_v2").value;
      }
      catch(err) { 
        var v2 = 'NA';
      } 
      try { 
      var v3 = document.getElementById("p_v3").value;
      }
      catch(err) { 
        var v3 = 'NA';
      } 
      try { 
      var v4 = document.getElementById("p_v4").value;
      }
      catch(err) { 
        var v4 = 'NA';
      } 
      try { 
      var v5 = document.getElementById("p_v5").value;
      }
      catch(err) { 
        var v5 = 'NA';
      } 
      var ctx = document.getElementById("myline");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [ d5,  d4, d3, d2, d1 ],
          datasets: [{
            label: "Attendance",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [v5, v4, v3, v2, v1],
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return  number_format(value) + '%' ;
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel  + ': ' + number_format(tooltipItem.yLabel) + '%' ;
              }
            }
          }
        }
      });

} 
 
</script>

