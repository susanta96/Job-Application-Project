<?php
session_start();
include_once('../config.php');
$eid=$_SESSION['e_id'];
$desig=$_POST['desig'];
$desc=$_POST['jobdesc'];
$exp=$_POST['exp'];
$money=$_POST['money'];
$salary=$_POST['pay'];
$jobtype=$_POST['jobtype'];
// $ug=$_POST['ugcourse'];
// $pg=$_POST['pgcourse'];
$date=date('d-m-y');
$pay=$money." ".$salary;

$str = '';
foreach($_POST['ugcourse'] as $vals) {
    $str .= $vals .',';
}

$newstr = mysqli_real_escape_string($db1, $str);
rtrim($newstr,' ');

$str1 = '';
foreach($_POST['pgcourse'] as $vals) {
    $str1 .= $vals .',';
}
$newstr1 = mysqli_real_escape_string($db1, $str1);
rtrim($newstr1,' ');



$query4="insert into trans_ads (e_id,title,Job_category,Description,Exp_required,Salary,ugqual,pgqual,postdate) VALUES ('$eid','$desig','$jobtype','$desc','$exp','$pay','$newstr','$newstr1','$date')";

if (!mysqli_query($db1,$query4))
{
 echo("Error description: " . mysqli_error($db1));
}
else{
    header('location:../employer/after_jobpost.php');
}
?>
