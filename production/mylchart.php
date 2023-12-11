<?php 
  include ('../php/conn.php');
        
  ?>
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['Year', 'Sales'],
          <?php 

           $startyr = "2018";
            $ryr = date("Y");
           $mrst = 0;
            for ($i=$startyr; $i <= $ryr ; $i++) { 
              $selectquery2 = "SELECT * FROM saleline WHERE saleDateTime LIKE '$i%'";
              $query2 = mysqli_query($conn, $selectquery2);
              $crow = mysqli_num_rows($query2);
              if ($crow != 0) {
                $mrst = 0;
                 while ($result = mysqli_fetch_assoc($query2)) {
                  $mrst += $result['Quantity']; 
                }
               
              }echo "['".$i."',".$mrst."],";
              
                
                
            }

          ?>

        ]);

        var options = {
          title: 'Gracey Mart Overall Performance',
          curveType: 'function',
          legend: { position: 'bottom' },

                    

         
          colors: ["#26B99A"],
         
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 700px; height: 500px"></div>
  </body>
</html>
  