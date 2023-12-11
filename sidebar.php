<?php 
  session_start();
  if (!isset($_SESSION['adminemail'])) {
    
    echo '<script> window.location="./production/login.php?e=login to perform this action";</script>';
}
$firstname = $_SESSION['adminfirstname'];
$lastname = $_SESSION['adminlastname'];
 //$query = "SELECT * FROM adminreg WHERE email = '$email' ";
 //$selected = mysqli_query($conn, $query);
 //$rslt = mysqli_fetch_assoc($selected); 
            
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./production/images/favicon.ico" type="image/ico" />

    <title>Graceys Mart Sales Prediction! | </title>

    <!-- Bootstrap -->

    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .logoutlogo:hover{
        color: red;
      }

      div.menu_section{margin-bottom:10px;}
      #fix-height{position: fixed; height:120vh;}
      div.menu_section h3{color:#1ABB9C;}
      ul.nav.side-menu>li>a{margin-bottom:5px;}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" id="fix-height">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="./production/index.php" class="site_title"><i class="fa fa-paw"></i> <span>Graceys Mart!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info >
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="./production/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2 style="text-transform: capitalize;"><?php echo $firstname. " ".$lastname; ?> </h2>
              </div>
            </div>
            < /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="./production/index.php"><i class="fa fa-paw"></i>Dashboard</a></li>
                  <li><a href="#sales"><i class="fa fa-clone"></i>Add Sales</a></li>
                  <li><a href="#reports"><i class="fa fa-desktop"></i> Sales Report</a></li>
                  <li><a href="#products"><i class="fa fa-edit"></i> Add Product</a></li>
                  <li><a href="#predictions"><i class="fa fa-table"></i>Predict Sales</a></li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Stock Info <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="./production/stockkeeper.php">All Stock</a></li>
                      <li><a href="./production/stockcategory.php">Category Chart</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>More</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-windows"></i> Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="./production/addadmin.php">Add Admin</a></li>
                      <li><a href="./index.php#/">About Software</a></li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a class="logoutlogo" data-toggle="tooltip" data-placement="top" title="Logout" href="./production/login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
          <div class="top_nav">
              <div class="nav_menu">
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
                  <nav class="nav navbar-nav" style="float: right;">
                  <ul class=" navbar-right" >
                    <li class="nav-item dropdown" style="padding-left: 15px;">
                      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-paw" style="font-size: 2em; border: 1px solid #5A738E; border-radius: 50%; padding: 5px;"> </span><span style="text-transform: capitalize;"><?php echo " ".$firstname. " ".$lastname; ?></span>

                      </a>
                      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" style="left: -60%;">
                        <a class="dropdown-item"  href="./production/addadmin.php">
                          <span class="pull-right"><i class="fa fa-paw"></i></span>
                          <span>Add Admin</span>
                        </a>
                        <a class="dropdown-item"  href="./index.php#/">About Software</a>
                        <a class="dropdown-item"  href="./production/login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      </div>
                    </li>
    
                  </ul>
                </nav>
              </div>
            </div>
        <!-- /top navigation -->  
      </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="vendors/raphael/raphael.min.js"></script>
    <script src="vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>