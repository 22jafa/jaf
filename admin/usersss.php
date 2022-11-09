<?php
include('header.php');
include 'db.php';
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
                        <i class="fa fa-plus-circle"></i> Add New User
                    </div>
                    <?php 
                    
                    if(isset($_POST['submit'])){
                  
                 
                    
                        $name=trim ($_POST['name']);
                        $email=trim ($_POST['email']);
                        $password=($_POST['pass']);
                        $confi_pass=($_POST['confi_pass']);
                        $pariv=$_POST['pariv'];

                        $select="SELECT * FROM user WHERE eamil= '$email'";
                        $tr=$con->prepare($select);
                        $tr->execute();
                        if($tr->rowCount()>0)
                        {
                            echo "<div class='alert alert-danger'>هذا الايميل مستخدم</div>" ;
                        }
    
                       
                        else if($password != $confi_pass){
                            echo "<div class='alert alert-danger'>password dosent match</div>" ;
    
                        }
                        else
                        {
                            $errors=array();

                        if (empty($name)) {
                            $errors['cname'] = "<div style='color:red'>Enter Name of Category</div>";}
                        if(is_numeric($name))
                        {
                            $errors['cename'] = "<div style='color:red'>name must be string</div>";
    
                        }
                        if (empty($email)) {
                            $errors['eamil'] = "<div style='color:red'>enter your eamil</div>";}
                            if (empty($password)) {
                                $errors['cpname'] = "<div style='color:red'>Enter Name of Category</div>";}
                                if (empty($confi_pass)) {
                                    $errors['cppname'] = "<div style='color:red'>Enter Name of Category</div>";}
                                   if(empty($errors))
                                   {
                               
                        
                            $sql="INSERT INTO user(name,eamil,password,con_pass,acou_id) VALUES (?,?,?,?,?) " ;
                            $stm = $con->prepare($sql);
                            $stm->execute(array($name , $email ,$password ,$confi_pass,$pariv ));
                            if ($stm->rowCount()==1) {
                                echo "<div class='alert alert-success'>Row Inserted</div>" ;
                            } else {
                                echo "<div class='alert alert-danger'>Row Not Inserted</div>" ;
                            }
                        
                      
                        
                        }
                    }


                    }
                   
                
               

                    ?>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" method="post"  enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" placeholder="Please Enter your Name " class="form-control" name="name" />
                                        <i style="color: red;">
                                            <?php if(isset( $errors['cname'] )) echo  $errors['cname']  ?>
                                        </i>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="PLease Enter Eamil"   name="email" />
                                        <i style="color: red;">
                                            <?php if(isset( $errors['eamil'] )) echo  $errors['eamil']  ?>
                                        </i>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Please Enter password" name="pass">
                                        <i style="color: red;">
                                            <?php if(isset( $errors['cpname'] )) echo  $errors['cpname']  ?>
                                        </i>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control"
                                            placeholder="Please Enter confirm password"  name="confi_pass" >
                                            <i style="color: red;">
                                            <?php if(isset( $errors['cppname'] )) echo  $errors['cppname']  ?>
                                        </i>
                                    </div>
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="pariv" >
                                        <?php
                                        
                                        $query = "SELECT * FROM acount";
                                        $result = $con->prepare($query);
                                        $result->execute();
                                            foreach ($result->fetchAll() as $acount_type) {
                                                
                                             echo '<option value="' . $acount_type['id'] . '">' . $acount_type['name'] . '</option>';  }
                                             ?> 
                                        </select>
                                    </div>
                                    <div style="right:float;" >

                                        <button    type="submit" name="submit" class="btn btn-primary">Add User</button>
                                        <button type="reset" class='btn btn-success'>Cancel</button>
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
                <div class="panel panel-secondary">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Users
                    </div>
                    <?php   
                    if(isset($_GET['action'],$_GET['user_id'])){
                       $id=$_GET['user_id'];
                       switch($_GET['action'])
                       {

                        case "delete":
                        $query="delete from users where id=:user_id";
                        $stm=$con->prepare($query);
                        $stm->execute(array("user_id"=>$id));
                        if($stm->rowCount()==1)
                        {
                           echo   "<div class='alert alert-success'>won row delete</div>" ; 
                        }
                      else { 
                    echo "<div class='alert alert-success'>won row not delete</div>" ; 
                            }
                            break ;
                            default:
                            echo "no this is error";
                            break;

                       }


                    }
                    
                    
                    
                    ?> 
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>  <th>usre_id</th>
                                        <th>اسم العميل </th>
                                        <th> ايميل</th>
                                        <th> كلمة السر </th>
                                        <th>تاكيد كلمة السر</th>
                                        <th> المهنة </th>
                                        <th> التعديل </th>
                                        <th> الحالة </th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stm = $con->prepare("select * from user");
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {
                                            $user_id = $row['id'];
                                            $username=$row['username'];
                                           $eamil = $row['eamil'];
                                            $str = $row['password'];
                                            $del = $row['con_password'];
                                            $statue=$row['statue'];
                                            


                                    ?>
                                    <tr class="odd gradeX">
                                       
                                        <td><?php echo $user_id ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $eamil  ?></td>
                                        <td><?php echo $str  ?></td>
                                        <td><?php echo $del  ?></td>
                                        <td><?php 
                                            $sql="select * from acount where id=:id" ;
                                            $stm = $con->prepare($sql);
                                            $stm->execute(array("id"=>$row['id']));
                                            foreach ($stm->fetchAll() as $catRow) {
                                               echo $catRow['name'];  
                                            }
                                           ?>
                                           </td>
                                          
                                            

                                                   
                                      
                                        <td>
                                            <a href="editusers.php?action=edit&user_id= <?php  echo $user_id ?>"
                                                class='btn btn-success'>Edit</a>
                                            <a href="?action=delete&user_id= <?php echo $user_id  ?> " class='btn btn-danger'
                                               id="delete" >Delete</a>   </td>
                                            <td>  <?php if($row['statue']==1){
                                                  echo '<p><a href="statue.php?user_id=' .$row['id']. 
                                                     '&statue=0" class="btn btn-success">active</a></p>' ;
                                            }
                                                     else
                                                     {
                                                        echo '<p><a href="statue.php?user_id=' .$row['id']. 
                                                        '&statue=1" class="btn btn-danger">uctive</a></p>' ;   
                                                     }
                                                      
                                               ?>   </td>


                                      
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
 include 'footer.php';
?>
<script>  
                $('#delete').click(function(){

    return confirm('are you sure delete!!');
});

 </script>