<?php
session_start();
include_once('../Job_Application/config.php');
// Data retreived  begins here

$uname=$_POST['name_user'];
$sex=$_POST['sex'];
$type=$_POST['acc_type'];
$email=$_POST['useremail'];
//echo $email;
$password=$_POST['pass1'];
$hash = password_hash($password, PASSWORD_DEFAULT);
//echo $password;



$query1="INSERT INTO mst_user (name_user,gender,account_type,email,login_pass) VALUES ('$uname','$sex','$type','$email','$hash')";

$result1 = mysqli_query($db1,$query1) ;

if(!$result1){
	echo ("Can't Register,The user email already exist !!");
}
else{
		$_SESSION['user_id'] = mysqli_insert_id($db1);

		if($type==="j"){
			header('location: ../Job_Application/jobseeker/register_user.php?msg=registered');
		}
		else if($type==="e"){
			header('location: ../Job_Application/employer/register_emp.php?msg=registered');
		}
		else{
			echo "Select Account Type First!!";
		}
	}




















?>
