<?php
include('header.php');
require('dbconnect.php');
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-tasks"></i> الحاجزين</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-8">
                <!-- Form Elements -->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-plus-circle"></i> الحجز من هنا
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            if (isset($_POST['submit'])) {
                                $name = trim($_POST['name']);
                                $hole_name = trim($_POST['hole_name']);
                                $price = trim($_POST['price']) ;
                                $errors = array();
                                if (empty($name)) {
                                    $errors['cname'] = "<div style='color:red'>Enter Name of bookedd</div>";
                                } elseif (is_numeric($name)) {
                                    $errors['cnameNumber'] = "<div style='color:red'>Enter String Name of Category</div>";
                                } else {
                                    $sql = "insert into bookedd (name,hole_name,price) values (?,?,?) ";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($name, $hole_name,$price));
                                    if ($stm->rowCount()) {
                                        echo "<div class='alert alert-success'>One Row Inserted </div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>One Row  not Inserted </div>";
                                    }
                                }
                            }

                            ?>
                            <div class="col-md-12">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" placeholder="Please Enter your Name " class="form-control"
                                            name="name" />
                                        <?php if (isset($errors['cname'])) echo $errors['cname'] ?>
                                        <?php if (isset($errors['cnameNumber'])) echo $errors['cnameNumber'] ?>
                                    </div>
                                    <div class="form-group">
                                        <label>hole_name</label>

                                        <textarea placeholder="Please Enter hole_name" class="form-control" cols="30"
                                            rows="3" name='hole_name'></textarea>

                                            <div class="form-group">
                                        <label>price</label>

                                        <textarea placeholder="Please Enter hole_name" class="form-control" cols="30"
                                            rows="3" name='price'></textarea>
                                            
                                    </div>

                                    <div style="float:right;">
                                        <button type="submit" name="submit" class="btn btn-primary">Add
                                         new  bookedd</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
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
                        <i class="fa fa-tasks"></i> حجز
                    </div>
                    <?php
                    if (isset($_GET['action'], $_GET['id'])) {
                        $id = $_GET['id'];
                        switch ($_GET['action']) {
                            case "delete":
                                $stm = $con->prepare("delete from bookedd where id=:catid");
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
                                        <th>Name</th>
                                        <th>hole_name</th>
                                        <th>price</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stm = $con->prepare("select * from bookedd");
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $hole_name = $row['hole_name'];
                                            $price = $row['price'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $id  ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $hole_name ?></td>
                                        <td><?php echo $price ?></td>
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