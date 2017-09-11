<?php
include_once('../Job_Application/config.php');

$email=$_POST['email'];
$passd=$_POST['password'];
$query=mysqli_query($db1,"select * from mst_user where email='$email'");
$result=mysqli_fetch_array($query,MYSQLI_ASSOC);

if(($result>0) && ( password_verify( $passd , $result['login_pass'] ) ) ){
    if($result['account_type']=="j")
    {
        session_start();
        $_SESSION["id"] = $result['id'];
        $_SESSION["type"] = $result['account_type'];
        header('location:jobseeker/profile.php?msg=success');
    }
 elseif($result['account_type']=="e")
 {
     session_start();
     $_SESSION["id"] = $result['id'];
     $_SESSION["type"] = $result['account_type'];
     header('location:employer/profile.php?msg=success');
 }
}
else
{
header('location:login.php?msg=failed');
}
?>
