<?php
include 'dbconnect.php';

    $id=$_GET['user_id'];
$statue=$_GET['statue'];
$qw="update user set statue=$statue where id=$id";
$op=$con->prepare($qw);
$op->execute();

header("location:users.php");





?>