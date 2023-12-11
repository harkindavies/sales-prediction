<?php 
include ('../php/conn.php');
include ('sidebar.php'); ?>
 <!DOCTYPE html>
          <html>
          <head>
            <title></title>
            <style>
              #fix-height{height:150vh;}
            </style>
          </head>
          <body style="background: #fff;">
            <div class="col-md-2"></div>
          <div class="col-md-10 col-sm-4 " style="padding-bottom: 50px;">
              <div class="">
                <div class="" style="margin-left: 15px;">
                  <h1>Stock Keeper<span style="font-size: 20px;">  These are the available stock</span></h1>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="">
                  <table class="" style="width:100%;" style="height: 100vh;">
                    <tr>
                      <th style="width:37%;">
                        <p style="margin-left: 15px;">Available stock</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                          <p class="">Category</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                          <p class="">Quantity</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut" height="320" width="320" style="margin: 15px 10px 10px 35px;"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <?php
                             $arr = array("","orange","aero","purple","red","green","blue","orange","aero","purple","red","green","blue","orange","aero","purple","red","green","blue","orange","aero");
                            $selectproductgrp = "SELECT * FROM productgroup";
                            $queryqrp = mysqli_query($conn, $selectproductgrp);
                            while ($resultgrp = mysqli_fetch_assoc($queryqrp)) {
                             $queryid = $resultgrp['Id'];
                             $querygrpname = $resultgrp['Name'];
                             
                            ?>
                          <tr>
                            <td>
                              <p><i class="fa fa-square <?php echo $arr[$queryid]; ?>"></i><?Php echo $querygrpname; ?> </p>
                            </td>
                            <td>
                              <?php 
                                $countg = "SELECT * FROM product WHERE productGroupId = '$queryid'";
                                $querycount = mysqli_query($conn, $countg);
                                $countsum = 0;
                                while ($countresult = mysqli_fetch_assoc($querycount)) {
                                  $countsum += $countresult['QuantityOnHand'];
                                }
                                echo $countsum; ?></td>
                          </tr>
                          <?php
                            }
                          ?>
                         
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </body>

          <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
          
        </html>

          <script type="text/javascript">
              
            function init_chart_doughnut() {

              if (typeof (Chart) === 'undefined') { return; }

              console.log('init_chart_doughnut');

              if ($('.canvasDoughnut').length) {

                  var chart_doughnut_settings = {
                      type: 'doughnut',
                      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                      data: {
                          labels: [
                          <?php
                                    $selectproductgrp2 = "SELECT * FROM productgroup";
                                    $queryqrp2 = mysqli_query($conn, $selectproductgrp2);
                                    while ($resultgrp2 = mysqli_fetch_assoc($queryqrp2)) {
                                     $queryid2 = $resultgrp2['Id'];
                                     $querygrpname2 = $resultgrp2['Name'];
                                    echo '"'.$querygrpname2.'",';
                                    }
                                  ?>
                              
                          ],
                          datasets: [{
                              data: [<?php
                                    $queryid2;
                                    for ($p=1; $p <= $queryid2 ; $p++) { 
                                      $selectproductgrp3 = "SELECT * FROM product WHERE productGroupId = '$p' ";
                                      $queryqrp3 = mysqli_query($conn, $selectproductgrp3);
                                      $querysum = 0;
                                      while ($resultgrp3 = mysqli_fetch_assoc($queryqrp3)) {
                                       $queryid3 = $resultgrp3['QuantityOnHand'];
                                       $querygrpname3 = $resultgrp3['QuantitySold'];
                                       $querysum += $queryid3 ;
                                      
                                    }echo $querysum.',';
                                  
                                    }
                                    
                                  ?>
                              ],
                              backgroundColor: [
                                  "#ffa500",
                                  "#BDC3C7",
                                  "#9B59B6",
                                  "#E74C3C",
                                  "#26B99A",
                                  "#3498DB",
                                  "#ffa500",
                                  "#BDC3C7",
                                  "#9B59B6",
                                  "#E74C3C",
                                  "#26B99A",
                                  "#3498DB",
                                  "#ffa500",
                                  "#BDC3C7",
                                  "#9B59B6",
                                  "#E74C3C",
                                  "#26B99A",
                                  "#3498DB",
                                  "#ffa500",
                                  "#BDC3C7"
                              ],
                              hoverBackgroundColor: [
                                  "#ffa500d9",
                                  "#CFD4D8",
                                  "#B370CF",
                                  "#E95E4F",
                                  "#36CAAB",
                                  "#49A9EA",
                                  "#ffa500d9",
                                  "#CFD4D8",
                                  "#B370CF",
                                  "#E95E4F",
                                  "#36CAAB",
                                  "#49A9EA",
                                  "#ffa500d9",
                                  "#CFD4D8",
                                  "#B370CF",
                                  "#E95E4F",
                                  "#36CAAB",
                                  "#49A9EA",
                                  "#ffa500d9",
                                  "#CFD4D8"
                              ]
                          }]
                      },
                      options: {
                          legend: false,
                          responsive: false
                      }
                  }

                  $('.canvasDoughnut').each(function () {

                      var chart_element = $(this);
                      var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

                  });

              }

            }
          </script>