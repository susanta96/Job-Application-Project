<?php
$host = "localhost";
$user  = "root";
$password = "";
$database1 = "job_application";

$db1 = mysqli_connect($host, $user, $password, $database1);
/*if($db1->connect_errno > 0){
    die('Unable to connect to database' . $db1->connect_error);
}else{
    echo "Database Job_Application is connected.";
}*/

?>
