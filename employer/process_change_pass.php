<?php
session_start();
include_once('../config.php');
if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
$password=$_POST['pass1'];
$hash = password_hash($password, PASSWORD_DEFAULT);

$q1 =  "UPDATE mst_user SET login_pass='$hash' WHERE id=$_SESSION[id]";
if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}
else{
    session_destroy();
    header('location:../login.php?msg=login_with_new_password');
}

?>
