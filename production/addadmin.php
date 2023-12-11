<?php
require "../php/conn.php";
include "sidebar.php";
//session_start();
//if (!isset($_SESSION['adminemail'])) {
    # code...\
    //echo '<script> window.location="login.php?e=login to perform this action";</script>';
//}
//$email = $_SESSION['adminemail'];
 //$query = "SELECT * FROM adminreg WHERE email = '$email' ";
 //$selected = mysqli_query($conn, $query);
 //$rslt = mysqli_fetch_assoc($selected); 
                

?>

<?php
    $firstnameerr = $lastnameerr = $passworderr = $cpassworderr = $emailerr = "";
    $firstname = $lastname = $password = $cpassword = $email = "";
    $msg = $passmsg = $msgfill = $existmsg = $msgwrong = $exceedmsg = $passerr = $existmail = $position = $adminimageerror = $positionerr = $existposition = $phone = $phoneerr = $existphone = $clearpass = "";
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $passmsg = "Password not match";
        if (empty($_POST["firstname"])) {
        $firstnameerr = "Firstname is required*";
        } else {
        $firstnam = test_input($_POST["firstname"]);
        $firstname = str_replace(" ", "", $firstnam);
        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
            ?>
                <!--div class='container'>
                    <div class='row'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                                <div class='resultmodalcontent resultcontenterror'>Only letters and white space are allow.</div>
                            </div>
                        </div>
                    </div>
                </div-->
            <?php
            $firstnameerr = "Only letters and white space are allowed";
            $firstname = ""; 
            }
        }
        if (empty($_POST["lastname"])) {
        $lastnameerr = "Lastname is required*";
        } else {
        $lastnam = test_input($_POST["lastname"]);
        $lastname = str_replace(" ", "", $lastnam);
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
            ?>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resresultmodalultmodal'>
                                <div class='resultmodalcontent resultcontenterror'>Only letters and white space are allow.</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            $lastnameerr = "Only letters and white space are allowed";
            $lastname = "";
            }
        }
        if (empty($_POST["password"])) {
            $passworderr = "Password is required*";
        } else {
            $password =$_POST["password"];
        }
        if (empty($_POST["cpassword"])) {
            $cpassworderr = "Confirm your password again*";
            $clearpass = "";
        } else {
            $cpassword = $_POST["cpassword"];
        }

        if (empty($_POST["email"])) {
            $emailerr = "Email is required*";
        } else {
            $email = test_input($_POST["email"]);
            //check mail valid or well formed
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "errormail";

            $emailerr = "invalid email address";
            $email = "";
        }

        }

        if ($firstname !== "" && $lastname !=="" && $password !=="" && $email !=="") {
            
            
            if ($password === $cpassword) {
                $passmsg = "";

                $mailvalidate = "SELECT * FROM adminreg WHERE email = '$email'";
                $chkmail = mysqli_query($conn, $mailvalidate);
                if (mysqli_num_rows($chkmail)>0) {
                    $existmail = "email already exist. <br />";
                    $passmsg = "Reconfirm your password.";
                    ?>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-md-12 col-sm-12 col-xs-12'>
                                    <div class='resultmodal resulterror' id='resultmodal'>
                                        <div class='resultmodalcontent resultcontenterror'>Email already exist.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php           
                }
                else{

                    //echo $lastname;
                    $valid = mysqli_query($conn,"select * from adminreg");
                    $count = mysqli_num_rows($valid);
                    
                        
                        $admin = 0;
                        for ($i=0; $i <=$count ; $i++) { 
                            $admin = $i;
                        }
                        
                        if ($admin > 3) {

                            $exceedmsg = "Admin already reach, admin cannot exceed four in number.";
                            ?>

                                <div class='container'>
                                    <div class='row'>
                                        <div class='col-md-12 col-sm-12 col-xs-12'>
                                            <div class='resultmodal resulterror' id='resultmodal'>
                                                <div class='resultmodalcontent resultcontenterror'>Admin already reach, admin cannot exceed four in number.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        else{

                            //password hashing
                            $timeTarget = 0.50;
                            
                            $cost = 8;
                            do{
                                $cost++;
                                $start = microtime(true);
                                $hashpassword = password_hash($password, PASSWORD_BCRYPT, ["cost"=>$cost]);
                                $end = microtime(true);
                            }
                            while (($end - $start) < $timeTarget);
                            
                            $insert = "INSERT INTO adminreg(firstname, lastname, email, password) VALUES ('".$firstname."', '".$lastname."', '".$email."', '".$hashpassword."')";
                            $check = mysqli_query($conn, $insert);
                            if ($check) {
                                $firstnameerr = $lastnameerr = $passworderr = $cpassworderr = $emailerr = "";
                                $firstname = $lastname = $password = $cpassword = $email = "";
                                $msg = $passmsg = $msgfill = $existmsg = $msgwrong = $exceedmsg = $passerr = $existmail = $position = $adminimageerror = $positionerr = $existposition = $phone = $phoneerr = $existphone = $clearpass = "";

                                  ?>

                                    <div class='container'>
                                        <div class='row'>
                                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                                <div class='resultmodal' id='resultmodal'>
                                                    <div class='resultmodalcontent'>You have successfully register a new admin.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                               <?php
                            }
                            else{
                                $msgwrong = "error, you have inserted wrong info <br />";
                            }
                        }
                    
                        
                }                      
            }
            else{
                $passmsg;
                ?>

                    <div class='container'>
                        <div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='resultmodal resulterror' id='resultmodal'>
                                    <div class='resultmodalcontent resultcontenterror'>Password not match.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        
        }
        else{
            //$msgfill = "fill all the empty box <br />";
        }

    }
?>
<script>
        // Add active class to the current page
        //document.getElementById("addadmin").className = "active";
</script>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Graceys Mart! | </title>

    <!--link rel="icon" href="images/favicon.png"-->
  </head>

  <body class="login" id="addprojectbody" style="overflow-y: hidden;">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        
        <div  class="animate form login_form">
          <section class="login_content">
             <form id="formid" data-toggle="" data-focus="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype ="multipart/form-data">

              <h1>Create Account</h1>
              <div class="form-group">
                <input class="form-control-input" oninput="inputdata(this),nameinput(this)" onblur="blurdata(this),nameblur(this)" type="text" required="" id="adminfirstname" name="firstname" value="<?php echo $firstname; ?>" >
                                    <label class="label-control" for="firstname" id="labefname">Firstname</label>

                                    <span id="fnameerror" class="error"><?php echo $firstnameerr; ?></span>
                
              </div >
              <div class="form-group">
                <input class="form-control-input" oninput="inputdata(this),nameinput(this)" onblur="blurdata(this),nameblur(this)" type="text" required="" id="adminlastname" name="lastname" value="<?php echo $lastname; ?>" >
                                    <label class="label-control" for="lastname" id="labellname">Lastname</label>

                                    <span id="lnameerror" class="error"><?php echo $lastnameerr;?></span>
                </div>
              <div class="form-group">
                <input class="form-control-input" oninput="inputdata(this),adminemail(this)" onblur="blurdata(this),adminmblur(this)" type="email" required="" id="email" name="email" value="<?php echo $email?>" autocomplete="off"  >
                                    <label class="label-control" for="email" id="labelemail">Email</label>

                                    <span id="emailerror" class="error"><?php echo $emailerr;  echo $existmail; ?></span>
              </div>
              <div class="form-group">
                <input class="form-control-input" oninput="inputdata(this),changpass()" onblur="blurdata(this),chkpassword()" type="password" required="" id="password" name="password" value="<?php echo $password; ?>"  >
                                    <label class="label-control" for="password" id="labelpassword">Password</label>

                <i id="eye" class="fa fa-eye-slash" /></i>

                <span id="passworderror" class="error"><?php echo $passworderr;?></span>
              </div>
              <div class="form-group">
                <input class="form-control-input" required="" oninput="inputdata(this),cpass()" onblur="blurdata(this),cpassblur()" type="password" id="cpassword" name="cpassword" value="<?php $clearpass; ?>" autocomplete="off" >
                                    <label class="label-control" for="cpassword" id="labelcpassword">Retype your Password</label>

                <span id="cpassworderror" class="error"><?php echo $passmsg; ?></span>
              </div>
              <div>
                <a class="btn btn-default submit" onclick="submitform()" id="mysubmit" name="submit">Create Account</a>

              </div>
              <div>
                  <div class="form-message">
                    <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-shopping-cart"></i> Graceys Mart!</h1>
                  <p>© <?php echo date("Y");?> Gracey Mart Sales Prediction System.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<style type="text/css">
    .login_form{
        margin-top: 30px;
    }
    .login_wrapper{
        margin-top: unset;
    }
    #eye{
        position: absolute;
         bottom: 30%;
        left: 93%;
        font-size: 1.3em;
        color: ;
    }


    /*pop-up styling */
  .resultmodal{
    display: none;
    width: 60%;
    height: ;
    background: rgba(0,200,100,0.7);
    position: fixed;
    margin: 0 auto;
    left: 20%;
    top: 0%;
    z-index: 999;
    border: 1px solid #14bf98;;
    border-radius: 0  0 5px 5px;
  }
  .resultmodalcontent{
    color: #fff;
    font-size: 23px;
    text-align: center;
    padding: 10px;
    font-family: Helvital;
    word-spacing: 3px;
  }

  .resulterror{
    border: 1px solid #d50000;
    background: rgba(255,0,0,0.6);

  }

  .resultcontenterror{
    color: #fff; 
  }
  
  .thumbnil{
    text-align: right;
    margin-bottom: 10px;
  }

  #thumbnil{
    visibility: hidden;
  }




/* Template: Aria - Business HTML Landing Page Template
   Author: Inovatik
   Created: Jul 2019
   Description: Master CSS file
*/

/*****************************************
Table Of Contents:

01. General Styles
02. Preloader
03. Navigation
04. Header
05. Intro
06. Description
07. Services
08. Details 1
09. Details 2
10. Testimonials
11. Call Me
12. Projects
13. Project Lightboxes
14. Team
15. About
16. Contact
17. Footer
18. Copyright
19. Back To Top Button
20. Extra Pages
21. Media Queries
******************************************/

/*****************************************
Colors:

- Backgrounds - light gray #fbfbfb
- Background - dark blue #153e52
- Backgrounds navbar, footer - dark gray #113448
- Buttons, bullets, icons - green #14bf98
- Headings text - black #484a46
- Body text - gray #787976
- Body text - light gray #dfe5ec
******************************************/


/******************************/
/*     01. General Styles     */
/******************************/
.error, .errmsg{color: #d50000; font-size: ;}
body,
html {
    width: 100%;
    height: 100%;
    
    overflow-x: hidden;
    overflow-y: auto;
}

.li-space-lg li {
    margin-bottom: 0.375rem;
}

.white {
    color: #dfe5ec;
}


.section-title {
    color: #14bf98;
    font: 500 0.8125rem/1.125rem "Montserrat", sans-serif;
    font-weight: bolder;
}


.form-group {
    position: relative;
    margin-bottom: 1.25rem;
}

.form-group.has-error.has-danger {
    margin-bottom: 0.625rem;
}

.form-group.has-error.has-danger .help-block.with-errors ul {
    margin-top: 0.375rem;
}

.label-control {
    position: absolute;
    top: 0.8125rem;
    left: 1.375rem;
    color: #787976;
    opacity: 1;
    font: 400 0.875rem/1.375rem "Open Sans", sans-serif;
    cursor: text;
    transition: all 0.2s ease;
}

/* IE10+ hack to solve lower label text position compared to the rest of the browsers */
@media screen and (-ms-high-contrast: active), screen and (-ms-high-contrast: none) {  
    .label-control {
        top: 0.9375rem;
    }
}

input[type=file]:focus, input[type=checkbox]:focus, input[type=radio]:focus {
    outline: unset;
    outline-offset: unset;
}

.form-control-input:focus + .label-control,
.form-control-input.notEmpty + .label-control,
.form-control-textarea:focus + .label-control,
.form-control-textarea.notEmpty + .label-control {
    top: 0.125rem;
    opacity: 1;
    font-size: 0.75rem;
    font-weight: 500;
}

.form-control-input,
.form-control-select {
    display: block; /* needed for proper display of the label in Firefox, IE, Edge */
    width: 100%;
    padding-top: 1.25rem;
    padding-bottom: 0.25rem;
    padding-left: 1.3125rem;
    border: 1px solid #dadada;
    border-radius: 0.25rem;
    background-color: #f7f7f7;
    color: #787976;
    font: 400 0.875rem/1.375rem "Open Sans", sans-serif;
    transition: all 0.2s;
    -webkit-appearance: none; /* removes inner shadow on form inputs on ios safari */
}

.form-control-select {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    height: 3rem;
}

/* IE10+ hack to solve lower label text position compared to the rest of the browsers */
@media screen and (-ms-high-contrast: active), screen and (-ms-high-contrast: none) {  
    .form-control-input {
        padding-top: 1.25rem;
        padding-bottom: 0.75rem;
        line-height: 1.75rem;
    }

    .form-control-select {
        padding-top: 0.875rem;
        padding-bottom: 0.75rem;
        height: 3.125rem;
        line-height: 2.125rem;
    }
}

select {
    /* you should keep these first rules in place to maintain cross-browser behavior */
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
    -o-appearance: none;
    appearance: none;
    background-image: url('../images/down-arrow.png');
    background-position: 96% 50%;
    background-repeat: no-repeat;
    outline: none;
}

select::-ms-expand {
    display: none; /* removes the ugly default down arrow on select form field in IE11 */
}

.form-control-textarea {
    display: block; /* used to eliminate a bottom gap difference between Chrome and IE/FF */
    width: 100%;
    height: 8rem; /* used instead of html rows to normalize height between Chrome and IE/FF */
    padding-top: 1.25rem;
    padding-left: 1.3125rem;
    border: 1px solid #dadada;
    border-radius: 0.25rem;
    background-color: #fff;
    color: #787976;
    font: 400 1rem/1.5625rem "Open Sans", sans-serif;
    transition: all 0.2s;
}

.form-control-input:focus,
.form-control-select:focus,
.form-control-textarea:focus {
    border: 1px solid #a1a1a1;
    outline: none; /* Removes blue border on focus */
}

.form-control-input:hover,
.form-control-select:hover,
.form-control-textarea:hover {
    border: 1px solid #a1a1a1;
}

.form-control-submit-button {
    display: inline-block;
    width: 100%;
    height: 3.125rem;
    border: 0.125rem solid #14bf98;
    border-radius: 0.25rem;
    background-color: #14bf98;
    color: #fff;
    font: 700 0.75rem/1.75rem "Montserrat", sans-serif;
    cursor: pointer;
    transition: all 0.2s;
}

.form-control-submit-button:hover {
    background-color: transparent;
    color: #14bf98;
}

/* Form Success And Error Message Formatting */
#lmsgSubmit.h3.text-center.tada.animated,
#cmsgSubmit.h3.text-center.tada.animated,
#pmsgSubmit.h3.text-center.tada.animated,
#lmsgSubmit.h3.text-center,
#cmsgSubmit.h3.text-center,
#pmsgSubmit.h3.text-center {
    display: block;
    margin-bottom: 0;
    color: #b93636;
    font: 400 1.125rem/1rem "Open Sans", sans-serif;
}

.help-block.with-errors .list-unstyled {
    color: #787976;
    font-size: 0.75rem;
    line-height: 1.125rem;
    text-align: left;
}

.help-block.with-errors ul {
    margin-bottom: 0;
}
/* end of form success and error message formatting */

/* Form Success And Error Message Animation - Animate.css */
@-webkit-keyframes tada {
    from {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
    10%, 20% {
        -webkit-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    }
    40%, 60%, 80% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    }
    to {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
}

@keyframes tada {
    from {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
    10%, 20% {
        -webkit-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    }
    40%, 60%, 80% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        -ms-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    }
    to {
        -webkit-transform: scale3d(1, 1, 1);
        -ms-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
}

.tada {
    -webkit-animation-name: tada;
    animation-name: tada;
}

.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
/* end of form success and error message animation - Animate.css */




/**********************/
/*     11. Call Me    */
/**********************/
.form-1 {
    padding-top: 3.125rem;  
    padding-bottom: 3.125rem;   
    background-color: #153e52e0;
    margin: 7% auto;
}

.form-1 .text-container {
    margin-bottom: 4rem;
}

.form-1 .section-title {
        font-size: 3vw;
        padding-bottom:1rem;
        text-align: center;
        line-height: 1.15;
}

.form-1 h2 {
    margin-bottom: 1.375rem;
    color: #fff;
}

.form-1 .list-unstyled .fas {
    color: #14bf98;
    font-size: 1.2rem;
    line-height: 2.15rem;
}

.form-1 .list-unstyled .media-body {
    margin-left: 0.625rem;
    font-size: 1.3rem;
}

.form-1 .label-control {
    color: #fff;
}

.form-1 .form-control-input,
.form-1 .form-control-select {
    border: 1px solid #39728f;
    background-color: #e6e6e6/*2a5d77*/;
    color: ;
}

.form-1 .form-control-textarea {
    border: 1px solid #39728f;
    background-color: #2a5d77;
    color: #fff;
}

.form-1 .form-control-input:focus,
.form-1 .form-control-input:hover,
.form-1 .form-control-select:focus,
.form-1 .form-control-select:hover,
.form-1 .form-control-textarea:focus,
.form-1 .form-control-textarea:hover {
    border: 1px solid #fff;
}

#lmsgSubmit.h3.text-center.tada.animated,
#lmsgSubmit.h3.text-center {
    color: #fff;
}

.form-1 .help-block.with-errors .list-unstyled {
    color: #dfe5ec;
}

#description, #messagetouser{
    min-height: 154px;
    resize: vertical;
}


/*****************************/
/*     21. Media Queries     */
/*****************************/
/* Max-width width 768px */
@media (max-width: 340px) {
    .form-1 {
        margin: 20% auto;
    }

}
@media (min-width: 340px) and (max-width: 468px) {
    .form-1 {
        margin: 15% auto;
    }

}

@media (min-width: 468px )and (max-width: 768px) {
    .form-1 {
        margin: 11% auto;
    }

}

/* end of min-width width 768px */

/* Min-width width 768px */
@media (min-width: 768px) {
    
    /* General Styles */
    .p-heading {
        width: 85%;
        margin-right: auto;
        margin-left: auto;
    }
    /* end of general styles */
}
/* end of min-width width 768px */


/* Min-width width 992px */
@media (min-width: 992px) {
    
    /* General Styles */
    .p-heading {
        width: 65%;
    }
    /* end of general styles */

    /* Call Me */
    .form-1 {
        padding-top: 4rem;  
    }

    .form-1 .text-container {
        margin-bottom: 0;
    }
    /* end of call me */
}
/* end of min-width width 992px */


/* Min-width width 1200px */
@media (min-width: 1200px) {
    
    /* General Styles */
    .p-heading {
        width: 55%;
    }
    /* end of general styles */

    /* Call Me */
    .form-1 .text-container {
        margin-top: 0.5rem;
        margin-right: 1.75rem;
        margin-left: 3rem
    }

    .form-1 form {
        margin-left: 1.75rem;
        margin-right: 3rem
    }
    /* end of call me */
}
/* end of min-width width 1200px */



/* end of min-width width 1200px */

</style>

     
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  

   
<script type="text/javascript">
    function submitform(){
      document.getElementById('formid').submit();
    }
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }


    function inputdata(inputdt){
        var inputdata = $(inputdt).parent("div");
        var inputchld = inputdata.children("span")[0];
        var inputlabel = inputdata.children("label")[0];
        var inputchild = $(inputchld).attr("id");
        var labelid = $(inputlabel).attr("id");
        //console.log(labelid)
        document.getElementById(inputchild).innerHTML = "";
        document.getElementById(labelid).style.display = "none";
    }

    /*FOR BLUR */
    function blurdata(blurdt){
        var blurdata = $(blurdt).parent("div");
        var blurinput = blurdata.children()[0];
        var blurlabel = blurdata.children("label")[0];
        var blurinputid= $(blurinput).attr("id");
        var blurlabelid = $(blurlabel).attr("id");
        var blurvalue = document.getElementById(blurinputid).value;
        var blurlength = blurvalue.length;
        //console.log(blurlength);
        if (blurlength < 1) {
            document.getElementById(blurlabelid).style.display = "block";
        }
        else{
            document.getElementById(blurlabelid).style.display = "none";
        }
    }

    /*check all input values*/

    var inputs = document.querySelectorAll('input');
    var myObject = {};

    for (var i = 0; i < inputs.length; i++) {
        myObject[inputs[i].id] = inputs[i].value;
        var mykeys = (Object.keys(myObject))

        if (Object.values(myObject)[i].length < 1) {
            var newvalues = (Object.keys(myObject)[i]);
            var inid = document.getElementById(newvalues)
            var inpar = $(inid).parent('div');
            var inlb = $(inpar).children('label')[0];
            var inlbid = $(inlb).attr('id');
            document.getElementById(inlbid).style.display = "block";
            //alert(Object.values(myObject)[i].length);
       }
       else{
            var newvalues = (Object.keys(myObject)[i]);
            var inid = document.getElementById(newvalues)
            var inpar = $(inid).parent('div');
            var inlb = $(inpar).children('label')[0];
            var inlbid = $(inlb).attr('id');
            document.getElementById(inlbid).style.display = "none";
       }
    }

    /*to turn password to text or password*/

  $("#eye").click(function(){
        var typechk = document.getElementById("password").type;
        if (typechk == "password") {
            document.getElementById("eye").className = "fa fa-eye";
            document.getElementById("password").type = "text";
        }
        else{
            document.getElementById("eye").className = "fa fa-eye-slash";
            document.getElementById("password").type = "password";
            
        }
    });


  /*for result output*/
  $("#resultmodal").slideUp(0);
  $("#resultmodal").slideDown(500);
  setTimeout(function(){
    $("#resultmodal").slideUp(500);
  }, 5000);

        /*for inputing */
    function changpass(){
        document.getElementById('eye').style.bottom = '53%';
        document.getElementById('cpassword').disabled = true;

        var rlt1; var rlt2; var rlt3;
        var c = document.getElementById('password');
        var chpass = document.getElementById('password').value;
        var patt2 = /[a-z]/ig;
        var result2 = chpass.match(patt2);
        var patt1 = /[ !~`@#$%^&()=*_+-;:.,<>'"{}\|/?0-9]/g;
        var result1 = chpass.match(patt1);
   
        if (result1 < 1) {
            rlt1 = 0;
        } else{
            var rlt1 = result1.length * 3;
        }

        if (result2 < 1) {
            rlt2 = 0;
        } else{
            var rlt2 = result2.length * 1;
        }
    
        var total = rlt1 + rlt2;
        
        if (total == 0) {
            document.getElementById('eye').style.bottom = '30%';

            var msgchk1 = document.getElementById('passworderror').innerHTML ="";
        }

        else if (total < 9){
            c.style.color = "red";
            var msgchk1 = document.getElementById('passworderror').innerHTML ="password is weak";
        }
        else if (total >= 9 && total < 13) {
            c.style.color = "rgb(255, 79, 0)";
            var msgchk1 = document.getElementById('passworderror').innerHTML = "password is fair";
        }
        else if (total >= 13 && total < 18) {
            c.style.color = "orange";
            var msgchk1 = document.getElementById('passworderror').innerHTML = "Enter some special characters to make it stronger";
        }
        else if (total >= 18 && total < 30) {
            var msgchk1 = document.getElementById('passworderror').innerHTML = "";
            c.style.color = "limegreen";
            document.getElementById('eye').style.bottom = '30%';
            document.getElementById('cpassword').disabled = false;

        }
        
        else{
            c.style.color = "#14bf98";
            var msgchk1 = document.getElementById('passworderror').innerHTML = "";
            document.getElementById('eye').style.bottom = '30%';
            document.getElementById('cpassword').disabled = false;
        }

        var confirmpass = document.getElementById("cpassword");
        var confrimp = document.getElementById("cpassword").value;
        if (confrimp !="" && confrimp !== chpass) {
            confirmpass.style.color = "orange";
            document.getElementById('cpassworderror').innerHTML ="Password not match again";

        }
        else if (confrimp != "" && confrimp === chpass){
            confirmpass.style.color = "#14bf98";
        }
    }

    function chkpassword(){
        document.getElementById('eye').style.bottom = '53%';

        var clearrlt = "";
        var rlt1; var rlt2; var rlt3;
        var c = document.getElementById('password');
        var chpass = document.getElementById('password').value;
        var patt2 = /[a-z]/ig;
        var result2 = chpass.match(patt2);
        var patt1 = /[ !~`@#$%^&()=*_+-;:.,<>'"|\{}/?0-9]/g;
        var result1 = chpass.match(patt1);
   
        if (result1 < 1) {
            rlt1 = 0;
        } else{
            var rlt1 = result1.length * 3;
        }

        if (result2 < 1) {
            rlt2 = 0;
        } else{
            var rlt2 = result2.length * 1;
        }
        
        var total = rlt1 + rlt2;

        if (total < 18) {
            var msgchk1 = document.getElementById('passworderror').innerHTML ="Please enter a stronger password";
        } 
        else if (total >= 18 && total < 30) {
            var msgchk1 = document.getElementById('passworderror').innerHTML = "";
            c.style.color = "limegreen";
            document.getElementById('eye').style.bottom = '30%';

        }else{
            c.style.color = "mrduimseagreen";
            var msgchk1 = document.getElementById('passworderror').innerHTML ="";
            document.getElementById('eye').style.bottom = '30%';

        }
    }

    /* for confirm password on input*/
    function cpass(){
        var cp = document.getElementById('cpassword');
        var cpa = document.getElementById('cpassword').value;
        var pas = document.getElementById('password').value;
        if (cpa.length < 6) {
            cp.style.color = "red";
            document.getElementById('cpassworderror').innerHTML ="Password not match yet";
        }
        else{
            cp.style.color = "rgb(255, 79, 0)";
            document.getElementById('cpassworderror').innerHTML ="Password not match yet";
        }
        if (cpa === pas) {
            cp.style.color = "#14bf98";
            document.getElementById('cpassworderror').innerHTML ="";

        }
    }

    /*function cpassblur(){
        var pascl = document.getElementById('password').style.color;
        if (pascl == "rgb(255, 79, 0)") {
        }
        else{
           document.getElementById('password').value = "";

        }
    }*/

    /*for name and email*/

    function adminemail(ml){
      var ordermpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,15})+$/;
      if (ml.value.match(ordermpattern)) {
        ml.style.color = "rgb(20, 191, 152)";
        
      }
      else{
        ml.style.color = "#005";
        document.getElementById('emailerror').innerHTML = "";

      }
    }

    function adminmblur(mblur){
      var mcolor = $(mblur).attr('id');
      var nmcolor = document.getElementById(mcolor).style.color;
      
      if(nmcolor == "rgb(20, 191, 152)"){
        document.getElementById('emailerror').innerHTML = ""; 
      }
      else{
        document.getElementById(mcolor).style.color = "red";
        document.getElementById('emailerror').innerHTML = "Not a valid email pattern";
        
      }
    }

    function nameinput(allname){
        var inpname = $(allname).parent("div");
        var inpspan = inpname.children("span")[0];
        var inpspanid = $(inpspan).attr("id");
        var lastpattern = /^[a-zA-Z ]*$/;
        var namespan = document.getElementById(inpspanid);
      
        if(allname.value.match(lastpattern) ){
            namespan.innerHTML = "";
            $(allname).css('color','#005');
        }
        else{
            $(allname).css('color','red');
            namespan.innerHTML = "Only letters and white space are allowed";
        }
    }

    function nameblur(nameblur){
        var blurname = $(nameblur).parent("div");
        var blurspan = blurname.children("span")[0];
        var blurspanid = $(blurspan).attr("id");
      var blurvalue = document.getElementById(blurspanid).innerHTML;

      if(blurvalue == ""){
        $(nameblur).css('color','#005');
      }
      else{
       $(nameblur).css('color','red');
      }
    }

  
</script>