<?php

include_once('../config.php');
session_start();
if(!isset($_SESSION['id'])){
    header('location:../login.php?msg=please_login');
}
elseif(!isset($_GET['jid'])){
    header('location:managejobs.php?msg=selectjob');
}
$query = "DELETE FROM trans_ads WHERE id=$_GET[jid]";
$result = mysqli_query($db1,$query);
if($result) {
    echo "<h3 style='color: green;'> Selected Job Is Successfully Deleted</h3>";
}
else{
    echo "<h3 style='color: red;'> Failed to delete the selected job!</h3>";
}
?>
