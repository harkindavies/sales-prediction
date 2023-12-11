<?php 
//session_start();
include ('../php/conn.php');
include ('sidebar.php'); 
$prodsesss = "";

$prodsesss = $_SESSION['amnt_selected'];
if ($prodsesss == "") {
    $_SESSION['amnt_selected'] = "Cosmetics";
    $prodsesss = $_SESSION['amnt_selected'];
   
 }
 else{
    $prodsesss = $_SESSION['amnt_selected'];
 }
 
?>



<!DOCTYPE html>
<html lang="en">
    <style>
        #fix-height{height:120vh;}
    </style>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


       

        <!-- page content -->
        <div class="right_col" role="main">
          <p id="selectedcat2"></p>

         
          <div class="">
            

            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-9"><h2>Graph On Sales And Available Stock</h2></div>
                    <div class="col-md-3">
                        <?php
                            $selectproductgrp2 = "SELECT * FROM productgroup";
                            $queryqrp2 = mysqli_query($conn, $selectproductgrp2);
                            ?>
                            <div class=""><select id="selectid" class="form-control" onchange="myFunction(this)" name="data"><option>Select Category</option>
                            <?php
                            while ($resultgrp2 = mysqli_fetch_assoc($queryqrp2)) {
                             $queryid2 = $resultgrp2['Id'];
                             $querygrpname2 = $resultgrp2['Name'];
                             ?>
                             <option id="<?php echo $queryid2; ?>" value="<?php echo $querygrpname2; ?>"><?php
                            echo $querygrpname2; ?></option><?php
                            }
                          ?>
                            </select></div>
              
              
                  </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="mainb" style="height:350px;"></div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->
        
    </div>

  </body>
</html>



<script src="../build/js/custom.min.js"></script>
         
<script>


 function myFunction(m) {

      var selectit  = $("#selectid :selected").val();
      var selectid2 = $("#selectid :selected").text();
      //console.log(selectit);
     // document.getElementById('selectedcat').innerHTML = "//<?php// echo $prodsesss;?>";
      //document.getElementById('myform').submit();
      //console.log('yes');
       var myAmount = selectit;
      $.ajax({
        url: "category.php",
        method: "GET",
        data: {myAmnt:myAmount},
        success: function (allamnt) {
          //document.getElementById("amntbox").src = allamnt;
          //alert(allamnt);
        }
      });

      
 
  location.reload(0);

}
</script>
<?php echo '<script>alert(allamnt);</script>'; ?>


<!--ECHRTS-->

<script>
function init_echarts() {

    if (typeof (echarts) === 'undefined') { return; }
    console.log('init_echarts');


    var theme = {
        color: [
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
        ],

        title: {
            itemGap: 8,
            textStyle: {
                fontWeight: 'normal',
                color: '#408829'
            }
        },

        dataRange: {
            color: ['#1f610a', '#97b58d']
        },

        toolbox: {
            color: ['#408829', '#408829', '#408829', '#408829']
        },

        tooltip: {
            backgroundColor: 'rgba(0,0,0,0.5)',
            axisPointer: {
                type: 'line',
                lineStyle: {
                    color: '#408829',
                    type: 'dashed'
                },
                crossStyle: {
                    color: '#408829'
                },
                shadowStyle: {
                    color: 'rgba(200,200,200,0.3)'
                }
            }
        },

        dataZoom: {
            dataBackgroundColor: '#eee',
            fillerColor: 'rgba(64,136,41,0.2)',
            handleColor: '#408829'
        },
        grid: {
            borderWidth: 0
        },

        categoryAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },

        valueAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitArea: {
                show: true,
                areaStyle: {
                    color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        timeline: {
            lineStyle: {
                color: '#408829'
            },
            controlStyle: {
                normal: { color: '#408829' },
                emphasis: { color: '#408829' }
            }
        },

        k: {
            itemStyle: {
                normal: {
                    color: '#68a54a',
                    color0: '#a9cba2',
                    lineStyle: {
                        width: 1,
                        color: '#408829',
                        color0: '#86b379'
                    }
                }
            }
        },
        map: {
            itemStyle: {
                normal: {
                    areaStyle: {
                        color: '#ddd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                },
                emphasis: {
                    areaStyle: {
                        color: '#99d2dd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                }
            }
        },
        force: {
            itemStyle: {
                normal: {
                    linkStyle: {
                        strokeColor: '#408829'
                    }
                }
            }
        },
        chord: {
            padding: 4,
            itemStyle: {
                normal: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                },
                emphasis: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                }
            }
        },
        gauge: {
            startAngle: 225,
            endAngle: -45,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                    width: 8
                }
            },
            axisTick: {
                splitNumber: 10,
                length: 12,
                lineStyle: {
                    color: 'auto'
                }
            },
            axisLabel: {
                textStyle: {
                    color: 'auto'
                }
            },
            splitLine: {
                length: 18,
                lineStyle: {
                    color: 'auto'
                }
            },
            pointer: {
                length: '90%',
                color: 'auto'
            },
            title: {
                textStyle: {
                    color: '#333'
                }
            },
            detail: {
                textStyle: {
                    color: 'auto'
                }
            }
        },
        textStyle: {
            fontFamily: 'Arial, Verdana, sans-serif'
        }
    };


    //echart Bar

    if ($('#mainb').length) {

        var echartBar = echarts.init(document.getElementById('mainb'), theme);

        echartBar.setOption({
            title: {
                text: '<?php echo $prodsesss; ?>',
                subtext: ''
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['sales', 'Available Stock']
            },
            toolbox: {
                show: false
            },
            calculable: false,
            xAxis: [{
                type: 'category',
                data: [
                 <?php
                 $select = "SELECT * FROM productgroup WHERE Name = '$prodsesss' ";
                 $queryselect = mysqli_query($conn, $select);
                 while ($sltresult = mysqli_fetch_assoc($queryselect)) {
                  $rstval = $sltresult['Id'];
                  $selectprod = "SELECT * FROM product WHERE productGroupId = '$rstval' "; 
                  $queryprod = mysqli_query($conn, $selectprod);
                  while ($rstprod = mysqli_fetch_assoc($queryprod)) {
                  $prodn = $rstprod['Name'];
                  echo "'".$prodn."'".",";
                }

               }
            ?>
            ]
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: 'sales',
                type: 'bar',
                data: [
                <?php
                 $select = "SELECT * FROM productgroup WHERE Name = '$prodsesss' ";
                 $queryselect = mysqli_query($conn, $select);
                 while ($sltresult = mysqli_fetch_assoc($queryselect)) {
                  $rstval = $sltresult['Id'];
                  /*"<?php $phpvar = "+selectid2+"; //echo $phpvar;?>"*/
                  //echo $rstval;
                  $selectprod = "SELECT * FROM product WHERE productGroupId = '$rstval' "; 
                  $queryprod = mysqli_query($conn, $selectprod);
                  while ($rstprod = mysqli_fetch_assoc($queryprod)) {
                  $prodvalq = $rstprod['QuantityOnHand'];
                  $prodvals = $rstprod['QuantitySold'];
                  $prodn = $rstprod['Name'];
                  $prodo = $rstprod['QuantityToOrder'];
                  $prodr = $rstprod['QuantityRequested'];
                  echo $prodvals.",";
                  //echo $prodvals."</br>";
                }

               }
            ?>
            ],
                markPoint: {
                    data: [{
                        type: 'max',
                        name: 'Highest Sales'
                    }, {
                        type: 'min',
                        name: 'Lowest Sales'
                    }]
                },
                markLine: {
                    data: [{
                        type: 'average',
                        name: 'Average'
                    }]
                }
            }, {
                name: 'Available Stock',
                type: 'bar',
                data: [
                <?php
                
                   $select = "SELECT * FROM productgroup WHERE Name = '$prodsesss' ";
                   $queryselect = mysqli_query($conn, $select);
                   while ($sltresult = mysqli_fetch_assoc($queryselect)) {
                    $rstval = $sltresult['Id'];
                    /*"<?php $phpvar = "+selectid2+"; //echo $phpvar;?>"*/
                    //echo $rstval;
                    $selectprod = "SELECT * FROM product WHERE productGroupId = '$rstval' "; 
                    $queryprod = mysqli_query($conn, $selectprod);
                    while ($rstprod = mysqli_fetch_assoc($queryprod)) {
                      $prodvalq = $rstprod['QuantityOnHand'];
                      //echo $prodvalq.",";
                      echo $prodvalq.",";
                    }

                   } 
                ?> ], markPoint: { data: [{ name: 'sales', value: 182.2, xAxis:
      7, yAxis: 183, }, { name: 'Stock', value: 2.3, xAxis: 11, yAxis: 3 }, { type: 'max', name: 'Highest Stock'}, { type: 'min', name: 'Lowest Stock'},] },
      markLine: { data: [{ type: 'average', name: 'Average' }] } }] });

    }
    
   
}


$(document).ready(function () {

    init_echarts();
   
}); 



</script>
