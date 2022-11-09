<!-- <?php 
// if(isset($_SESSION['user'])){
  include('header.php');
  require('dbconnect.php');
?> -->
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-dashboard "></i> صفحه ادره الموقع</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-users"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">
                            <?php
                            $sql="select * from user" ;
                            $stm = $con->prepare($sql);
                            $stm->execute();

                           echo  $stm->rowCount();
                            
                            
                            ?>user</p>
                        <br>
                        <br>
                    </div>
                    <a href="users.php">
                    <div class="panel-footer">
                            <span class="pull-left">عرض البيانات</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-tasks"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text"> <?php
                            $sql='Select * from booked';
                            $stm = $con->prepare($sql);
                            $stm->execute();

                           echo  $stm->rowCount();
                            
                            
                            ?> حجز</p>
                        <br>
                        <br>

                    </div>
                    <a href="booked.php">
                        <div class="panel-footer">
                            <span class="pull-left">عرض البيانات</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        
                        <i class="fa fa-table"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">pro</p>
                        <br>
                        <br>
                    </div>
                    <a href="hole.php">
                        <div class="panel-footer">
                            <span class="pull-left">عرض البيانات</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span  class= "icon-box bg-color-green set-icon">
                        
                        <i class="fa fa-table"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">الصالات الاعراس</p>
                        <br>
                        <br>
                    </div>
                    <a href="hals.php">
                        <div class="panel-footer">
                            <span class="pull-left">عرض البيانات</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span  class= "icon-box bg-color-green set-icon">
                        
                        <i class="fa fa-table"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">اكوش الاعراس</p>
                        <br>
                        <br>
                    </div>
                    <a href="koush.php">
                        <div class="panel-footer">
                            <span class="pull-left">عرض البيانات</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-users"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">
                            <?php
                            $sql="select * from bookedd" ;
                            $stm = $con->prepare($sql);
                            $stm->execute();

                           echo  $stm->rowCount();
                            
                            
                            ?>الحاجزين من الموقع</p>
                        <br>
                        <br>
                    </div>
                    <a href="bookedt.php">
                    <div class="panel-footer">
                            <span class="pull-left">عرض البيانات</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<?php
 include('footer.php');
// } else
// {
//     echo "plase log <a href='../login.php'> log in </a> ";
// }
// ?>
