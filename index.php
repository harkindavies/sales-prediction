<?php include ('sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en" data-ng-app='myApp'>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gracey Mart | </title>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/>
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
    <link href="css/style.css" rel="stylesheet"> </head>
    
<body>

    <!--nav class="navbar navbar-default">
        <div class="container"-->

            <!-- Brand and toggle get grouped for better mobile display -->
            <!--div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#/">PHP</a> </div-->
                    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="background: ; display: inline-block;">
                    <li><a href="#/">Home</a></li>
                    <li><a href="#sales">Sales</a></li>
                    <li><a href="#reports">Sale Reports</a></li>
                    <li><a href="#products">Product List</a></li>
                    <li><a href="#predictions">Order-Forecasting</a></li>
                </ul>
            </div-->
            <!-- /.navbar-collapse -->
        <!--/div-->
        <!-- /.container-fluid -->
    <!--/nav-->
    <div data-ng-view></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox-core.min.js">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular-sanitize.min.js"></script>
    <script src="js/ng-csv.min.js"></script>
    <script src="js/app.js"></script>
    
</body>

</html>