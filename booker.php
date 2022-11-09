<?php
include('./admin/head1.php');
include './admin/dbconnect.php';
// include 'sidebar.php';
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-users"></i> المستخدمين</h2>


            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-8">
                <!-- Form Elements -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-plus-circle"></i> Add New booked
                    </div>
                    <?php 
                    if(isset($_POST['submit'])){
                    $name=$_POST['name'];
                    $hole_name=$_POST['hole_name'];
                   $peice=['price'];
                //    $desc=$_POST['desc'];
                //    $price['price'];
                //    $date['date'];
                    $errors=array();
                            $sql="INSERT INTO bookedd(name,hole_name,price) VALUES (?,?,?) " ;
                            $stm = $con->prepare($sql);
                            $stm->execute(array($name ,$hole_name,$price ));
                            if ($stm->rowCount()==1) {
                                echo "<div class='alert alert-success'>Row Inserted</div>" ;
                            } else {
                                echo "<div class='alert alert-danger'>Row Not Inserted</div>" ;
                            }
                    }
                    ?>
                     <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" method="post"  enctype="multipart/form-data" >
                                    
                               
                                <!-- <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="name" > 
                                       
                                        
                                        // $query = "SELECT * FROM users";
                                        // $result = $con->prepare($query);
                                        // $result->execute();
                                        //     foreach ($result->fetchAll() as $acount_type) {
                                                
                                        //      echo '<option value="' . $acount_type['id'] . '">' . $acount_type['username'] . '</option>';  }
                                        //      ?> 
                                        <!-- </select>
                                    </div> -->
                                  
                                    <!-- <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="hole_name" > -->
                                        <?php
                                        
                                        // $query = "SELECT * FROM romm NATURAL JOIN room_type";
                                        // $result = $con->prepare($query);
                                        // $result->execute();
                                        //     foreach ($result->fetchAll() as $acount_type) {
                                                
                                        //      echo '<option value="' . $acount_type['room_type_id'] . '">' . $acount_type['room_type'] . '</option>';  }
                                        //      ?> 
                                        </select>
                                        <div class="form-group">
                                        <label>name</label>
                                        <input type="text" class="form-control"
                                            placeholder="Please Enter confirm password"  name="name" >

                                        </div>
                                        <div class="form-group">
                                        <label>hole_name</label>
                                        <input type="text" class="form-control"
                                            placeholder="Please Enter confirm password"  name="hole_name" >
                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               </div> 
                                    <div class="form-group">
                                        <label>price</label>
                                        <input type="text" class="form-control"
                                            placeholder="Please Enter confirm password"  name="price" >
                                          
                                     </div>

                                    <!-- <div class="form-group">
                                        <label>desc</label>
                                        <input type="text" class="form-control"
                                            placeholder="Please Enter confirm password"  name="desc" >

                                        </div>
                                        <div class="form-group">
                                        <label>price</label>
                                        <input type="text" class="form-control"
                                            placeholder="Please Enter confirm password"  name="hole_name" >
                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               </div> 
                                    <div class="form-group">
                                        <label>date</label>
                                        <input type="text" class="form-control"
                                            placeholder="Please Enter confirm password"  name="date" >
                                          
                                    </div> --> -->

                                    <div style="right:float;" >

                                        <button  type="submit" name="submit" class="btn btn-primary">اضافه حجز</button>
                                        <button type="reset" class='btn btn-success'>رفض</button>
                                    </div>

                            </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <hr />
        <?php  include '././admin/footer.php'; ?>