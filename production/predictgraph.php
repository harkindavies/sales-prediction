 <?php

require "../php/conn.php";
 //session_start();
//include "../index.php";

/*$arlen0 = count($ncontent0);
$arlen = count($ncontent);
$arlen1 = count($ncontent1);
$arlen2 = count($ncontent2);
echo $arlen0."</br>";
echo $arlen."</br>";
echo $arlen1."</br>";
echo $arlen2."</br>";*/
//print_r ($ncontent0);
/*print_r ($ncontent);
print_r ($ncontent1);
print_r ($ncontent2);*/

//print_r ($content0[90]);
//echo $content0[1];


include ('sidebar.php'); 
//$str0 = $_SESSION['str0'];
//echo $str0;

?>

<script type="text/javascript">
   
</script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gracey Mart</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            
            <div class="clearfix"></div>

            <div class="row">
              

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="col-md-12" >
                      <div class="col-md-4">
                        <a href="../index.php#/predictions"><button style="outline: 1px solid #3498DB; color:#73879C ; width: 80%;" type="button" class="btn btn-default btn-lg tabButton">Predict Sales</button></a>
                      </div>
                      <!-- GET for generating CSV file. http://code.stephenmorley.org/php/creating-downloadable-csv-files/ -->
                      <div class="col-md-4" style="display: none;">
                        <button style="outline: 1px solid #3498DB; width: 80%; color: #fff; background:rgba(0,0,0,.3);" type="button" class="btn btn-default btn-lg tabButton" ng-csv="productArray" filename="Predictions.csv" field-separator="," decimal-separator="." disabled="" onmouseover="mouseoverit()">Generate CSV</button>
                      </div>
                      <div class="col-md-4">
                          <button style="background: #3498DB; width: 80%;  color: #fff;" type="button" class="btn btn-default btn-lg tabButton" ng-click="getPredictions2()" id="prechart" onclick="clickitt()">Prediction Chart</button>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_line" style="height:450px;"></div>

                  </div>
                </div>
              </div>

             
            </div>
          </div>
        </div>
        <!-- /page content -->

        
      </div>
    </div>

 
  </body>
</html>
<!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


<?php
  $_SESSION['content0']= $_GET['content0'];
  $_SESSION['content'] = $_GET['content'];
  $_SESSION['content1'] = $_GET['content1'];
  $_SESSION['content2'] = $_GET['content2'];

  $content0 = $_SESSION['content0'];
  $content = $_SESSION['content'];
  $content1 = $_SESSION['content1'];
  $content2 = $_SESSION['content2'];
  $ncontent0 = str_replace(" ", "_", $content0);
  $ncontent = str_replace(" ", "_", $content);
  $ncontent1 = str_replace(" ", "_", $content1);
  $ncontent2  = str_replace(" ", "_", $content2);

  $nncontent0 = explode(", ", $content0);
  $nncontent = explode(", ", $content);
  $nncontent1 = explode(", ", $content1);
  $nncontent2 = explode(", ", $content2);
  $arlen0 = count($nncontent0);
?>


<script type="text/javascript">

/* ECHRTS */

function init_echarts() {
  //console.log(pass);


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
                color: '#73879C'
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


    



    if ($('#echart_line').length) {

        var echartLine = echarts.init(document.getElementById('echart_line'), theme);

        echartLine.setOption({
            title: {
                text: 'Prediction Chart',
                subtext: ''
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                x: 220,
                y: 40,
                data: ['Safe Mode', 'Sales Prediction', 'Available Stock']
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        title: {
                            line: 'Line',
                            bar: 'Bar',
                            stack: 'Stack',
                            tiled: 'Tiled'
                        },
                        type: ['line', 'bar', 'stack', 'tiled']
                    },
                    restore: {
                        show: true,
                        title: "Restore"
                    },
                    saveAsImage: {
                        show: true,
                        title: "Save Image"
                    }
                }
            },
            calculable: true,
            xAxis: [{
                type: 'category',
                boundaryGap: false,
                data: [
                <?php 
                for ($i=0; $i < $arlen0-1; $i++) { 
                     echo $nncontent0[$i].",";
                  }
                  
                ?>]
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: 'Available Stock',
                type: 'line',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },
                data: [
                <?php 
                for ($j=0; $j < $arlen0-1; $j++) { 
                     echo $nncontent1[$j].",";
                  }
                  
                ?>]
            }, {
                name: 'Sales Prediction',
                type: 'line',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },
                data: [
                <?php 
                for ($k=0; $k < $arlen0-1; $k++) { 
                     echo $nncontent[$k].",";
                  }
                  
                ?>]
            }, {
                name: 'Safe Mode',
                type: 'line',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },
                data: [
                <?php 
                for ($l=0; $l < $arlen0-1; $l++) { 
                     echo $nncontent2[$l].",";
                  }
                  
                ?>]
            }]
        });

    }

  

}


$(document).ready(function () {

    
    init_echarts();
    
});   

</script>




                <?php/*
                  for ($j=0; $j < 7; $j++) { 
                    echo $ncontent[$j].",";
                  }*/
                ?>


                <?php
                    /*for ($k=0; $k < 7; $k++) { 
                      echo $ncontent1[$k].",";
                    }*/
                  ?>


   
                   