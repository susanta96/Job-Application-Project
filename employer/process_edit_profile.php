
<?php
session_start();
include_once('../config.php');
if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
$name=$_POST['compname'];
$addr=$_POST['addr'];
$pin=$_POST['pin_code'];
$cityid=$_POST['city'];
$countryid=$_POST['country'];
$website=$_POST['website'];
$profile=$_POST['about'];

$q1 =  "UPDATE mast_company SET Company_name='$name',Address='$addr',City='$cityid',Zip='$pin',Country='$countryid',Website='$website',Profile='$profile' WHERE id=$_SESSION[e_id]";

if (!mysqli_query($db1,$q1))
{
    echo("Error description: " . mysqli_error($db1));
}
else{
    session_destroy();
    echo "<script> alert('Please Login Again !! You made Some Changes ');</script>";
    header('location:../login.php?msg=please_login');
}

 ?>
