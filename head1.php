<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">لوحه التحكم</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 
<?php
if($_SESSION['user'])
{
echo  "<p> welcooome " . $_SESSION['user']['name'] ."</p>";
}
  ?>
<a href="../login.php" class="btn btn-success square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <!-- <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> لوحه التحكم</a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fa fa-users "></i>المستخدمين</a>
                    </li>
                    <li>
                        <a href="booked.php"><i class="fa fa-tasks"></i>الحجز </a>
                    </li>
                    <li>
                        <a href="../bookedd.php"><i class="fa fa-bars"></i>الحاجزين من الموقع</a>
                    </li>
                    <li>
                        <a href="hole.php"><i class="fa fa-bars"></i>الصالات</a>
                    </li> -->




                </ul>

            </div>

        </nav>