<?php 
session_start();
include('header.php');
require('admin/db.php');
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-tasks"></i> editusers</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-8">
                <!-- Form Elements -->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-plus-circle"></i> Edit users
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            if(isset($_GET['action'],$_GET['user_id']) && $_GET['action']=='edit' )
                            {
                                $id=$_GET['user_id'];
                             $stm = $con->prepare("select * from users where id=:user_id");
                             $stm->execute(array("user_id"=>$id));
                             if ($stm->rowCount()) {
                               
                                 foreach ($stm->fetchAll() as $row) {
                                    $user_id = $row['id'];
                                    $username=$row['username'];
                                   $eamil = $row['eamil'];
                                    $pass = $row['password'];
                                    $con_pass = $row['con_password'];
                                    $pri_id=$row['pri_id'];
                                 }
                            if (isset($_POST['submit'])) {
                              //  $id=$_POST['room_id'];
                                $username = $_POST['name'];
                                $eamil = $_POST['eamil'];
                                $pass = $_POST['pass'];
                                $con_pass = $_POST['confi_pass'];
                                $pri_id = $_POST['pariv'];
                              //  $eamil = trim(($_POST['number_room']));

                                $errors = array();
                                                     
    // if ($description != '') {
    //     $sql = "SELECT * FROM romm WHERE number_room = '$description'";
    //     $result=$con->prepare($sql);
    //     $result->execute();
    //     if($result->rowCount()>1){
    //         echo "<div class='alert alert-success'> romm </div>" ;}
    //         else{
    //             echo "<div class='alert alert-success'>Row romm Inserted</div>" ; 
    //         }

    //     } 
                                    $sql = "update users set username=? , eamil=?, password=?, con_password=?, pri_id=? where id=? ";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($username, $eamil,$pass,$con_pass,$pri_id,$user_id));
                                    if ($stm->rowCount()) {
                                        echo "<script>
                                        alert('One Row Updated');
                                        window.open('login.php','_self');
                                         </script> 
                                        ";
                                    } else {
                                        echo "<div class='alert alert-danger'>One Row  not Updated </div>";
                                    }
                                }
                            
                        
                            
                            ?>
                          <div class="col-md-12">
                          <form role="form" method="post"  enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" placeholder="Please Enter your Name " class="form-control" name="name" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="PLease Enter Eamil"   name="eamil" />

                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Please Enter password" name="pass">

                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control"
                                            placeholder="Please Enter confirm password"  name="confi_pass" >

                                    </div>
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="pariv" >
                                        <?php
                                        
                                        $query = "SELECT * FROM accounta where id=2";
                                        $result = $con->prepare($query);
                                        $result->execute();
                                            foreach ($result->fetchAll() as $acount_type) {
                                                
                                             echo '<option value="' . $acount_type['id'] . '">' . $acount_type['name'] . '</option>';  }
                                             ?> 
                                        </select>
                                    </div>
                                    <div style="right:float;" >

                                        <button    type="submit" name="submit" class="btn btn-primary">edit User</button>
                                        <button type="reset" class='btn btn-success'>Cancel</button>
                                    </div>

                            </div>
                            </form>
                            <?php } }?>

                        </div>


                    </div>
                </div>
            </div>

        </div>
        <hr />

        
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
</div>


<?php
include('admin/footer.php');
?>

















?>