 <?php
include('header.php');
require('dbconnect.php');
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-tasks"></i> booked</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-8">
                <!-- Form Elements -->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-plus-circle"></i> اضافه حجز
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            
                            if (isset($_POST['addbook'])) {
                                $hole =$_POST['hole_id'];
                               $koush =$_POST['koush_id'];
                                $data= $_POST['date'];
                               $user_id = $_POST['user_id'];
                                $errors = array();
                                if (empty($name)) {
                                    $errors['cname'] = "<div style='color:red'>Enter Name of Category</div>";
                                } elseif (is_numeric($name)) {
                                    $errors['cnameNumber'] = "<div style='color:red'>Enter String Name of Category</div>";
                                } else {
                                    $sql = "insert into booked(hole_id,koush_id,date,usre_id) values (?,?,?,?) ";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($hole, $koush,$data,$user_id));
                                    if ($stm->rowCount()==1) {
                                        echo "<div class='alert alert-success'>One Row Inserted </div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>One Row  not Inserted </div>";
                                    }
                                }
                            }
                            
                       
                            ?>
                            <!-- <div class="col-md-12">
                                <form role="form" method="post"> -->
                                    <!-- <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" placeholder="Please Enter your Name " class="form-control"
                                            name="name" /> -->
                                        <!-- //if (isset($errors['cname'])) echo $errors['cname'] ?>
                                         //if (isset($errors['cnameNumber'])) echo $errors['cnameNumber']  --> -->
                                        <div class="col-md-12"> -->
                                      <form role="form" method="post" >
                                        


                                    <div class="form-group">
                                    <label>hole_id</label>
                                        <select calss="form-control" name="hole_id">
                                            <?php
                                            $sql = "select * from hole ";
                                            $stm = $con->prepare($sql);
                                            $stm->execute();
                                            foreach($stm->fetchAll() as $row)
                                            {

                                            

                                                echo '<option value="' . $row['hole_id'] . '">' . $row['name'] . '</option>'; }

                                               
                                           
                                            ?>
                                            </select>
                                            </div>
                                            <div>

                                            <label>koush_id</label>
                                        <select calss="form-control" name="koush_id">
                                            <?php
                                            $sql = "select * from koush ";
                                            $stm = $con->prepare($sql);
                                            $stm->execute();
                                            foreach($stm->fetchAll() as $row)
                                            {

                                            

                                                echo '<option value="' . $row['koush_id'] . '">' . $row['name'] . '</option>'; }

                                               
                                           
                                            ?>
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                        <label>date</label>
                                        <input type="date" class="form-control" name="date" placeholder="PLease Enter Eamil" />
                                    </div>

                                    <div class="form-group">
                                        <label>user_id</label>
                                        <select calss="form-control" name="user_id">
                                            <?php
                                            $sql = "select * from user ";
                                            $stm = $con->prepare($sql);
                                            $stm->execute();
                                            foreach($stm->fetchAll() as $row)
                                            {

                                            

                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>'; }

                                               
                                           
                                            ?>
                                            </select> 
                                     </div>



                                              
                                    <div style="float:right;">
                                        <button type="submit" name="addbook" class="btn btn-primary">اضافه حجز
                                            </button>
                                        <button type="reset" class="btn btn-danger">رفض</button>
                                    </div>

                            </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-tasks"></i> 
                    </div>
                    <?php
                    if (isset($_GET['action'], $_GET['id'])) {
                        $id = $_GET['id'];
                        switch ($_GET['action']) {
                            case "delete":
                                $stm = $con->prepare("delete from booked where id=:catid");
                                $stm->execute(array("catid"=>$id));
                                if($stm->rowCount()==1)
                                {
                                    echo "<div class='alert alert-success'> One Row Deleted</div>";
                                }
                                break;


                            default:
                                echo "ERROR";
                                break;
                        }
                    }


                    ?>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>hole_id</th>
                                        <th>koush_id</th>
                                        <th>data</th>
                                        <th>user_id</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stm = $con->prepare("select * from booked");
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {
                                            $id = $row['id'];
                                            $hole = $row['hole_id'];
                                            $koush= $row['koush_id'];
                                            $data = $row['date'];
                                            $user_id = $row['user_id'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $id  ?></td>
                                        <td><?php echo $hole?></td>
                                        <td><?php echo $koush ?></td>
                                        <td><?php echo $data ?></td>
                                        <td><?php echo $user_id ?></td>
                                        <td>
                                            <a href="editcategory.php?action=edit&id=<?php echo $id ?>"
                                                class='btn btn-success'>Edit</a>
                                            <a href="?action=delete&id=<?php echo $id ?>" class='btn btn-danger'
                                                id="delete">Delete</a>

                                        </td>
                                    </tr>
                                    <?php  }
                                    } else { ?>

                                    <div class='alert alert-danger'>Not Row </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->

            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
</div>

<?php
include('footer.php');
?>

<script>
    $('.delete').click(function () {
        return confirm('Are You Sure !!');
    });
</script>