<?php 
  include ('../php/conn.php');
  include ('sidebar.php'); 
         
    //get all the date values
    $startDate =  Date('Y-m-d H:i:s');

    //for day date
      $DendDate = new DateTime();
      $DendDate->modify('-1 day');
      $DendDateString = $DendDate->format('Y-m-d H:i:s');

      $DendDate2 = new DateTime();
      $DendDate2->modify('-2 day');
      $DendDateString2 = $DendDate2->format('Y-m-d H:i:s');

    //for week date 
      $endDate = new DateTime();
      $endDate->modify('-1 week');
      $endDateString = $endDate->format('Y-m-d H:i:s');

      $endDate2 = new DateTime();
      $endDate2->modify('-2 week');
      $endDateString2 = $endDate2->format('Y-m-d H:i:s');

      //for month date
      $mendDate = new DateTime();
      $mendDate->modify('-1 month');
      $mendDateString = $mendDate->format('Y-m-d H:i:s');

      $mendDate2 = new DateTime();
      $mendDate2->modify('-2 month');
      $mendDateString2 = $mendDate2->format('Y-m-d H:i:s');


      //for year date
      $yEndDate = new DateTime();
      $yEndDate->modify('-1 year');
      $yEndDateString = $yEndDate->format('Y-m-d H:i:s');

      $yEndDate2 = new DateTime();
      $yEndDate2->modify('-2 year');
      $yEndDateString2 = $yEndDate2->format('Y-m-d H:i:s');



      //getting all the values between aparticular day range
      $sqlstringday = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$DendDateString' AND '$startDate'";
      $selectd =  mysqli_query($conn, $sqlstringday);
      $rowd = mysqli_num_rows($selectd);
      $daysum = 0;
      if($rowd > 0){
      while($dayrst = mysqli_fetch_array($selectd)){
        $daysum += $dayrst['Quantity'];
      }
      }
      else{
      $daysum = 0;
      }

      $sqlstringday2 = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$DendDateString2' AND '$startDate'";
      $selectd2 =  mysqli_query($conn, $sqlstringday2);
      $rowd2 = mysqli_num_rows($selectd2);
      $daysum2 = 0;
      if($rowd2 > 0){
      while($dayrst2 = mysqli_fetch_array($selectd2)){
        $daysum2 += $dayrst2['Quantity'];
      }
      } else{
      $daysum2 = 0;
      }

      //calculating the difference
      $prevdsales = $daysum2-$daysum;
      //calculating all percentage difference
      $dpercentagedif = 0;
      if($prevdsales != 0){
        $dpercentagedif = (($daysum - $prevdsales)/$prevdsales)*100;
        $dpercentagedif = (int) $dpercentagedif;
      }
      if ($prevdsales == 0 and $daysum != 0) {
        $dpercentagedif = 100;
        # code...
      }
      
      //adding class properties to the division
      if ($daysum > $prevdsales) {
        $dclassP1 = "green";
        $dclassP2 = "fa fa-sort-asc"; 
      }
      elseif ($daysum == $prevdsales) {
        $dclassP1 = "";
        $dclassP2 = ""; 
      } else{
        $dclassP1 = "red";
        $dclassP2 = "fa fa-sort-desc";
      }



      //getting all the values between aparticular week range
      $sqlstringweek = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$endDateString' AND '$startDate'";
      $selectw =  mysqli_query($conn, $sqlstringweek);
      $rowwC = mysqli_num_rows($selectw);
      $weeksum = 0;
      if($rowwC > 0){
      while($weekrst = mysqli_fetch_array($selectw)){
        $weeksum += $weekrst['Quantity'];
      }
      //echo $weeksum;
      }
      else{
      $weeksum = 0;
      }

      $sqlstringweek2 = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$endDateString2' AND '$startDate'";
      $selectw2 =  mysqli_query($conn, $sqlstringweek2);
      $rowwC2 = mysqli_num_rows($selectw2);
      $weeksum2 = 0;
      if($rowwC2 > 0){
      while($weekrst2 = mysqli_fetch_array($selectw2)){
        $weeksum2 += $weekrst2['Quantity'];
      }
      } else{
      $weeksum2 = 0;
      }

      //calculating the difference
      $prevwsales = $weeksum2-$weeksum;
      //calculating all percentage difference
      $percentagedif = 0;
      if($prevwsales != 0){
        $percentagedif = (($weeksum - $prevwsales)/$prevwsales)*100;
        $percentagedif = (int) $percentagedif;
      }
      if ($prevwsales == 0 and $weeksum != 0) {
        $percentagedif = 100;
        # code...
      }
      
      //adding class properties to the division
      if ($weeksum > $prevwsales) {
        $classP1 = "green";
        $classP2 = "fa fa-sort-asc"; 
      }
      elseif ($weeksum == $prevwsales) {
        $classP1 = "";
        $classP2 = ""; 
      } else{
        $classP1 = "red";
        $classP2 = "fa fa-sort-desc";
      }



    //getting all the values between aparticular month range
      $sqlstringmonth = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$mendDateString' AND '$startDate'";
      $selectm =  mysqli_query($conn, $sqlstringmonth);
      $rowmC = mysqli_num_rows($selectm);
      $monthsum = 0;
      if($rowmC > 0){
      while($monthrst = mysqli_fetch_array($selectm)){
        $monthsum += $monthrst['Quantity'];
      }
      //echo $weeksum;
      }
      else{
      $monthsum = 0;
      }

      $sqlstringmonth2 = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$mendDateString2' AND '$startDate'";
      $selectm2 =  mysqli_query($conn, $sqlstringmonth2);
      $rowmC2 = mysqli_num_rows($selectm2);
      $monthsum2 = 0;
      if($rowmC2 > 0){
      while($monthrst2 = mysqli_fetch_array($selectm2)){
        $monthsum2 += $monthrst2['Quantity'];
      }
      } else{
      $monthsum2 = 0;
      }

      //calculating the difference
      $prevmsales = $monthsum2-$monthsum;
      //calculating all percentage difference
      $mpercentagedif = 0;
      if($prevmsales != 0){
        $mpercentagedif = (($monthsum - $prevmsales)/$prevmsales)*100;
        $mpercentagedif = (int) $mpercentagedif;
      }
      if ($prevmsales == 0 and $monthsum != 0) {
        $mpercentagedif = 100;
        # code...
      }
      
      //adding class properties to the division
      if ($monthsum > $prevmsales) {
        $mclassP1 = "green";
        $mclassP2 = "fa fa-sort-asc"; 
      }
      elseif ($monthsum == $prevmsales) {
        $mclassP1 = "";
        $mclassP2 = ""; 
      } else{
        $mclassP1 = "red";
        $mclassP2 = "fa fa-sort-desc";
      }



      //getting all the values between aparticular year range
      $sqlstringyear = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$yEndDateString' AND '$startDate'";
      $selecty =  mysqli_query($conn, $sqlstringyear);
      $rowy = mysqli_num_rows($selecty);
      $yearsum = 0;
      if($rowy > 0){
      while($yearrst = mysqli_fetch_array($selecty)){
        $yearsum += $yearrst['Quantity'];
      }
      //echo $yearsum;
      }
      else{
      $yearsum = 0;
      }

      $sqlstringyear2 = "SELECT Quantity FROM SaleLine WHERE saleDateTime BETWEEN '$yEndDateString2' AND '$startDate'";
      $selecty2 =  mysqli_query($conn, $sqlstringyear2);
      $rowy2 = mysqli_num_rows($selecty2);
      $yearsum2 = 0;
      if($rowy2 > 0){
      while($yearrst2 = mysqli_fetch_array($selecty2)){
        $yearsum2 += $yearrst2['Quantity'];
      }
      } else{
      $yearsum2 = 0;
      }

      //calculating the difference
      $prevysales = $yearsum2-$yearsum;
      //calculating all percentage difference
      $ypercentagedif = 0;
      if($prevysales != 0){
        $ypercentagedif = (($yearsum - $prevysales)/$prevysales)*100;
        $ypercentagedif = (int) $ypercentagedif;
      }
      if ($prevysales == 0 and $yearsum != 0) {
        $ypercentagedif = 100;
        # code...
      }
      
      //adding class properties to the division
      if ($yearsum > $prevysales) {
        $yclassP1 = "green";
        $yclassP2 = "fa fa-sort-asc"; 
      }
      elseif ($yearsum == $prevysales) {
        $yclassP1 = "";
        $yclassP2 = ""; 
      } else{
        $yclassP1 = "red";
        $yclassP2 = "fa fa-sort-desc";
      }


      //for all sales 
      $sqlstringall = "SELECT Quantity FROM SaleLine";
      $selectall =  mysqli_query($conn, $sqlstringall);
      $rowall = mysqli_num_rows($selectall);
      $allsum = 0;
      if($rowall > 0){
      while($allrst = mysqli_fetch_array($selectall)){
        $allsum += $allrst['Quantity'];
      }
      } else{
      $allum = 0;
      }

      //for available product
      $sqlqantity = " SELECT QuantityOnHand FROM product";
      $selectq =  mysqli_query($conn, $sqlqantity);
      $rowq = mysqli_num_rows($selectq);
      $qtysum = 0;
      if($rowq > 0){
      while($qtyrst = mysqli_fetch_array($selectq)){
        $qtysum += $qtyrst['QuantityOnHand'];
      }
      } else{
      $qtysum = 0;
      }

/*
  $sqlstringyear = mysqli_query($conn, "SELECT Sale.ID, Sale.SaleDateTime, SUM(SaleLine.Quantity) AS TotalItems, SUM(Product.Price * Product.QuantitySold) AS TotalValue 
          FROM Sale JOIN SaleLine ON Sale.ID = SaleLine.SaleId JOIN Product ON SaleLine.ProductId = Product.Id WHERE Sale.SaleDateTime BETWEEN '$mEndDateString' AND '$startDate'");
  $newstyear = mysqli_fetch_assoc($sqlstringyear);
  $sumyear = $newstyear['TotalItems'];

  $sqlstringall = mysqli_query($conn, "SELECT Sale.ID, Sale.SaleDateTime, SUM(SaleLine.Quantity) AS TotalItems, SUM(Product.Price * SaleLine.Quantity) AS TotalValue FROM Sale JOIN SaleLine ON Sale.ID = SaleLine.SaleId JOIN Product ON SaleLine.ProductId = Product.Id ");
  $newstall = mysqli_fetch_assoc($sqlstringall);
  $sumall = $newstall['TotalItems'];*/

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Gracey Mart Sales Prediction | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
            <div class="tile_count">
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Daily Sales</span>
                <div class="count <?php echo $dclassP1;?>"><?php echo number_format($daysum); ?></div>
                <span class="count_bottom"><i class=<?php echo $dclassP1; ?>><i class="<?php echo $dclassP2; ?>"></i><?php echo $dpercentagedif; ?>% </i> From Yesterday</span>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Weekly Sales</span>
                <div class="count <?php echo $classP1;?>"><?php echo number_format($weeksum); ?></div>
                <span class="count_bottom"><i class=<?php echo $classP1; ?>><i class="<?php echo $classP2; ?>"></i><?php echo $percentagedif; ?>% </i> From last Week</span>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Monthly sales</span>
                <div class="count <?php echo $mclassP1;?>"><?php echo number_format($monthsum); ?></div>
                <span class="count_bottom"><i class=<?php echo $mclassP1; ?>><i class="<?php echo $mclassP2; ?>"></i><?php echo $mpercentagedif; ?>% </i> From last Week</span>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Year Sales</span>
                <div class="count <?php echo $yclassP1;?>"><?php echo number_format($yearsum); ?></div>
                <span class="count_bottom"><i class=<?php echo $yclassP1; ?>><i class="<?php echo $yclassP2; ?>"></i><?php echo $ypercentagedif; ?>% </i> From last Year</span>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Sales</span>
                <div class="count"><?php echo  number_format($allsum); ?></div>
                <span class="count_bottom">overall Sales</span>
              </div>
              
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total goods</span>
                <div class="count"><?php echo number_format($qtysum); ?></div>
                <span class="count_bottom">Available in stock</span>
              </div>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Network Activities <small>of overall sales flow</small></h3>
                  </div>
                  <!--div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="fa fa-calendar"></i>
                      <span></span> <b class="caret"></b>
                    </div>
                  </div-->
                </div>


                <!--div class="col-md-12 col-sm-12 ">
                    <div id="curve_chart" style=" height: 500px"></div>
                </div-->
                <div class="col-md-9 col-sm-9 ">
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="mylineChart" width="389" height="230" style="width: 389px; height: 194px;"></canvas>

                    <div class="col-md-4" style=" text-align: center;"><span class="fa fa-square" style="color: rgba(3, 88, 106, 0.70); font-size: 1.5em; "></span><span> Sales since 12 years back</span></div>
                    <div class="col-md-4" style=" text-align: center;"><span class="fa fa-square" style="color: rgba(255, 165, 0, 0.8); font-size: 1.5em; "></span><span> Last year sales</span></div>
                    <div class="col-md-4" style=" text-align: center;"><span class="fa fa-square" style="color: rgba(38, 185, 154, 0.7); font-size: 1.5em; "></span><span> Sales since the begining of this year</span></div>
                    
                  </div>
                  <!--div id="chart_plot_01" class="demo-placeholder"></div-->
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                  <div class="x_title">
                    <h2>Top 5 sales Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 ">
                    
                    <div>
                      <?php 
                        $checksold = "SELECT * FROM product WHERE QuantitySold != '0' ORDER BY QuantitySold desc Limit 5";
                        $checkquery = mysqli_query($conn, $checksold);
                        while ($soldresult = mysqli_fetch_assoc($checkquery)) {
                          $resultnval = $soldresult['Name'];
                          $resultqval = $soldresult['QuantitySold'];
                          $reuslthval = $soldresult['QuantityOnHand'] + $resultqval;
                          $percentageSold = ($resultqval/$reuslthval)*(100);
                           ?><div><?php echo $resultqval; ?> pieces of </div>
                        <p><?php echo $resultnval; ?> sold</p>
                        <div class="">
                          <div class="progress progress_sm" style="width: 76%;">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $percentageSold; ?>"></div>
                          </div>
                        </div>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                  

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />




          <div class="row">


            <div class="col-md-9 col-sm-9 ">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Product Checker</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Products that are low</h4>
                  <?php 
                        $lowproduct = "SELECT * FROM product where QuantityOnHand <= 30 order by QuantityOnHand asc limit 4";
                        $lowquery = mysqli_query($conn, $lowproduct);
                        while ($lowresult = mysqli_fetch_assoc($lowquery)) {
                          $lowname = $lowresult['Name'];
                          $lowonhand = $lowresult['QuantityOnHand'];
                          if ($lowonhand > 20) {
                            $color = "orange";
                          }
                          elseif ($lowonhand  <=20) {
                            $color = "#E74C3C";
                          }
                          else{
                            $color = "red";
                          }
                        
                       ?>
                  <div class="widget_summary">
                    
                    <div class="">
                      
                      <span ><?php echo $lowname?></span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress" style="height: 10px;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $lowonhand; ?>" aria-valuemin="0" aria-valuemax="100" style="background:<?php echo $color; ?>; width: <?php echo ($lowonhand*3).'%'; ?>;">
                          <span class="sr-only"><?php echo ($lowonhand).'%'; ?> Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo $lowonhand; ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div></br></br>
                  <?php
                    }
                  ?>

                </div>
              </div>
            </div>

           


            <div class="col-md-3 col-sm-3 ">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Stock Level</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                   

                    <div class="">
                        <!--h4>Profile Completion</h4-->
                        <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 90%; height: 160px; margin: 0 5%;"></canvas>
                        <div class="goal-wrapper">
                          <span id="gauge-text" class="gauge-value pull-left" style="margin-left: 20%;">0</span>
                          <span class="gauge-value pull-left"></span>
                          <span id="goal-text" class="goal-value pull-right" style="margin-right: 20%;"></span>
                        </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>

          </div>


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Gracey Mart <?php echo date("Y"); ?><a href="#"> Sale Analysis and Prediction</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	<script type="text/javascript">


 
        // Line chart

    if ($('#mylineChart').length) {

        var ctx = document.getElementById("mylineChart");
        var mylineChart = new Chart(ctx, {
            type: 'line',
            data: {
                
                labels: [
                <?php 
                  $labels = array("Jan","Feb","Mar","Apr","May","Jun","Jly","Aug","Sept","Oct","Nov","Dec");
                  $ryr1 = date("Y");
                  $startyr1 = $ryr1+1 - 12;
                  $l = 0;
                  $lastyear = $ryr1-1;
                  for ($b=$startyr1; $b <=$ryr1 ; $b++) { 
                    echo '"'.$b." | ".$lastyear." | ".$labels[$l].'"'.",";
                    $l++;
                  }
                ?>
                ],
      
                datasets: [{
                    label: "Total sales",
                    backgroundColor: "rgba(3, 88, 106, 0.3)",
                    borderColor: "rgba(3, 88, 106, 0.70)",
                    pointBorderColor: "rgba(3, 88, 106, 0.70)",
                    pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(151,187,205,1)",
                    pointBorderWidth: 1,
                    data: [

                    <?php 

                             
                              $ryr = date("Y");
                              $startyr = $ryr+1 - 12;
                              $rmth = date("m");
                             $mrst = 0;
                            $j = 0;
                              for ($i=$startyr; $i <= $ryr ; $i++) { 
                                $j++;
                                $selectquery2 = "SELECT * FROM saleline WHERE saleDateTime LIKE '$i%'";
                                $query2 = mysqli_query($conn, $selectquery2);
                                $crow = mysqli_num_rows($query2);
                                if ($crow != 0) {
                                  $mrst = 0;
                                   while ($result = mysqli_fetch_assoc($query2)) {
                                    $mrst += $result['Quantity']; 
                                  }
                                 
                                }echo $mrst.",";
                                
                                  
                                  
                              }

                      ?>
                      ]
                }, {
                    label: "Last year Sales",
                    backgroundColor: "rgba(255, 165, 0, 0.3)",
                    borderColor: "rgba(255, 165, 0, 0.8)",
                    pointBorderColor: "rgba(255, 165, 0, 0.8)",
                    pointBackgroundColor: "rgba(255, 165, 0, 0.8)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(208,234,231,1)",
                    pointBorderWidth: 1,
                    data: [
                     <?php 
                              $ryr = date("Y");
                              
                              $rmth = date("m");
                            
                            $lastyear = $ryr-1;
                            $j = date("Y-m");
                              for ($i=1; $i <= 12 ; $i++) { 
                                //echo $i;
                                $mrst = 0;
                                
                                if($i < 10){
                                  $j = $lastyear."-0".$i;
                                }
                                else{
                                  $j = $lastyear."-".$i;
                                }
                               
                                $selectquery2 = "SELECT * FROM saleline WHERE saleDateTime LIKE '$j%'";
                                

                                $query2 = mysqli_query($conn, $selectquery2);
                                $crow = mysqli_num_rows($query2);
                                if ($crow != 0) {
                                  $mrst = 0;
                                    while ($result = mysqli_fetch_assoc($query2)) {
                                      $mrst += $result['Quantity']; 
                                    }
                                 
                                }echo $mrst.",";
                                
                              }

                      ?>
                    /*82, 23, 66, 9, 99,60,80,100*/]
                },  {
                    label: "Sales since the begining of the year",
                    backgroundColor: "rgba(38, 185, 154, 0.31)",
                    borderColor: "rgba(38, 185, 154, 0.7)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: [
                     <?php 
                              $ryr = date("Y");
                              
                              $rmth = date("m");
                             $mint = (int)$rmth;
                          
                            $j = date("Y-m");
                              for ($i=1; $i <= $mint ; $i++) { 
                                //echo $i;
                                $mrst = 0;
                                if($i < 10){
                                  $j = $ryr."-0".$i;
                                }
                                else{
                                  $j = $ryr."-".$i;
                                }
                                
                                $selectquery2 = "SELECT * FROM saleline WHERE saleDateTime LIKE '$j%'";
                                

                                $query2 = mysqli_query($conn, $selectquery2);
                                $crow = mysqli_num_rows($query2);
                                if ($crow != 0) {
                                  $mrst = 0;
                                    while ($result = mysqli_fetch_assoc($query2)) {
                                      $mrst += $result['Quantity']; 
                                    }
                                 
                                }echo $mrst.",";
                                
                                  
                                  //echo $i;
                              }

                      ?>
                    /*82, 23, 66, 9, 99,60,80,100*/]
                }]
            },
        });

    }


function init_gauge() {

    if (typeof (Gauge) === 'undefined') { return; }

    console.log('init_gauge [' + $('.gauge-chart').length + ']');

    console.log('init_gauge');


    var chart_gauge_settings = {
        lines: 12,
        angle: 0,
        lineWidth: 0.4,
        pointer: {
            length: 0.75,
            strokeWidth: 0.042,
            color: '#dc3545'//'#1D212A'
        },
        limitMax: 'false',
        colorStart:'#1ABC9C',
        colorStop: '#1ABC9C',
        strokeColor: '#F0F3F3',
        generateGradient: true
    };


    if ($('#chart_gauge_01').length) {

        var chart_gauge_01_elem = document.getElementById('chart_gauge_01');
        var chart_gauge_01 = new Gauge(chart_gauge_01_elem).setOptions(chart_gauge_settings);

    }


    if ($('#gauge-text').length) {
        <?php 
          $selectGauge = "SELECT * FROM product";
                              $querygauge = mysqli_query($conn, $selectGauge);
                              $guagesum = $gaugesoldsum = 0;
                              while ($resultgauge = mysqli_fetch_assoc($querygauge)) {
                               $gaugeonhand = $resultgauge['QuantityOnHand'];
                               $gaugesold = $resultgauge['QuantitySold'];
                               $guagesum += $gaugeonhand + $gaugesold ;
                               $gaugesoldsum += $gaugesold;
                              }
        ?>
        chart_gauge_01.maxValue = <?php echo $guagesum; ?>;
        chart_gauge_01.animationSpeed = 32;
        chart_gauge_01.set(<?php echo $gaugesoldsum; ?>);
        chart_gauge_01.setTextField(document.getElementById("gauge-text"));
        document.getElementById("goal-text").innerHTML = "<?php echo $guagesum; ?>"

    }

    if ($('#chart_gauge_02').length) {

        var chart_gauge_02_elem = document.getElementById('chart_gauge_02');
        var chart_gauge_02 = new Gauge(chart_gauge_02_elem).setOptions(chart_gauge_settings);

    }


    if ($('#gauge-text2').length) {

        chart_gauge_02.maxValue = 9000;
        chart_gauge_02.animationSpeed = 32;
        chart_gauge_02.set(2400);
        chart_gauge_02.setTextField(document.getElementById("gauge-text2"));

    }


}
    
</script>
</body>
</html>
