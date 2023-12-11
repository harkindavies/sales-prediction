<?php 
  include "../php/conn.php";
  session_start();
  if (isset($_SESSION['adminemail'])) {
    unset($_SESSION['adminemail']);
  }
?>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Graceys Mart login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   <!--link rel="icon" href="../images/icon.png"-->
</head>


<?php

// define variables and set to empty values
  $passworderr = $emailerr = "";
  $password = $email = "";
  $msg = $passmsg = $welcomemsg = $ticketno = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["password"])) {
      $passworderr = "Password is required*";
    } else {
      $password = test_input($_POST["password"]);
      $password = mysqli_real_escape_string($conn, $password);
    }

    if (empty($_POST["email"])) {
      $emailerr = "Email is required*";
    } else {
      $email = test_input($_POST["email"]);
      //check mail valid or well formed
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = "invalid email address";
        $email = "";
      }
    }

    if ((empty($email)) && (empty($password))) {
     $msg = " Pls fill all the empty boxes*";
    }

    if (empty($password)) {
      # code...
      $passworderr = "Password is required*";
    }
    else{
    }
    if (empty($email)) {
      $emailerr = "Email is required*";
    }else{

      $select = "SELECT * FROM adminreg WHERE email = '".$email."'";
      $check = mysqli_query($conn, $select);
      $chkresult = mysqli_num_rows($check);

      if (($chkresult == 1) && (!empty($password))) {
        if ($result = mysqli_fetch_assoc($check)) {
          $dp = $result['password'];
          if (password_verify($password, $dp)) {
              $_SESSION['adminemail'] = $email;
              $_SESSION['adminfirstname'] = $result['firstname'];
              $_SESSION['adminlastname'] = $result['lastname'];
            echo"<script>window.location='../production/index.php';</script>";
          }
          
          else{
              $passworderr =  "Incorrect Password";
          }
        } else{}
      }
      elseif($chkresult == 1 && (empty($password))){
        $passworderr = "Password is required*";
      }
      elseif($chkresult < 1 && (!empty($email))){
         $emailerr = "Not a Registered Email";
      } else{}
    }
  }
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

    <title>Graceys Mart! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <!--a class="hiddenanchor" id="signup"></a-->
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="loginform">
              <h1>Login Form</h1>
              <div>
                <input class="form-control" type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" id="email" autocomplete oninput="chang(this)"><span id="selectml" class="error"><?php echo $emailerr; ?></span>
              </div>
              <div>
                <input class="form-control" type="password" name="password" placeholder="Enter your Password" id="password" autocomplete="off" oninput="chang(this)"><span id="selectps" class="error"><?php echo $passworderr; echo $passmsg; ?></span>
               </div>
              <div>
                <label></label>
                <a class="btn btn-default submit" onclick="submitform()" id="mysubmit" name="submit">Log in</a>
                <a class="reset_pass" href="#" class="btn btn-default submit">Lost your password?</a>
              </div>
              <!--div class="">
                <label></label>
              <span class="errmsg" id="msg"><?php #echo $msg; ?></span>
              </div-->

              <div class="clearfix"></div>

              <div class="separator">
                <!--p class="change_link">New Admin?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-shopping-cart"></i> Graceys Mart!</h1>
                  <p>©<?php echo date("Y");?> All Rights Reserved. Gracey Mart Sales Prediction System!. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="#">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  h1><i class="fa fa-shopping-cart"></i> Graceys Mart!</h1>
                  <p>©<?php echo date("Y");?> All Rights Reserved. Gracey Mart Sales Prediction System!. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
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
    <!--script src="../build/js/custom.min.js"></script-->
  

<style type="text/css">

  #mysubmit:hover{
    color: #1ABB9C;
  }
  
  .error, .errmsg{
    color: #d50000;
    padding-top: 0;
    margin-top: 0;
  }

</style>

<script type="text/javascript">
  function chang(sltd){
    var inputdata = $(sltd).parent("div");
    var inputchld = inputdata.children("span")[0];
    var inputchild = $(inputchld).attr("id");
    document.getElementById(inputchild).innerHTML = "";
    document.getElementById("msg").innerHTML = "";
  }
function submitform(){
  document.getElementById('loginform').submit();
}
  
</script>
