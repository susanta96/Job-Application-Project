<?php
include_once('../config.php');
session_start();
if(!isset($_SESSION['id'])){
    header('location:../login.php?msg=please_login');
}
else{
 $q="select * from mst_user where id = ".$_SESSION['id'];
 $query=mysqli_query($db1,$q);
 $result=mysqli_fetch_assoc($query);
 $email=$result['email'];
 //echo $email;
}
?>



<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META HTTP-EQUIV="refresh" CONTENT="60">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <link href="../css/main.css" rel="stylesheet">
  <link href="../css/employer.css" rel="stylesheet">
<head>
    <title>Thank You</title>
</head>
<div id="nav">
    <nav class="emp-nav">
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="../employer/profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">Job Posted</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->
<body>
<h3 style="color: green; margin-top: 50px; " class="text-center">Thank You <?php $_SESSION['name']?></h3>
<div class="page-header" style="background: #f4511e"></div>
<?php  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 25px'><strong>Your Ad is Successfully Posted .</strong> <br>Soon it will be published. We will send you a confirmation email to your provided email id.</p>
        </div> </div>";
        echo "<center><a style='color: whitesmoke;'  href='../employer/profile.php'><button type='button' class='btn btn-success'>Go Back</button></a>";

?>
<?php

$to ="$email";
$subject = "Thank You";
$headers[] = 'MI: 1.0';
$headers[] = 'Content-type: text/html; charset=utf8_encode';
$message = "
        <html>
        <head>
        <title>Successfully JOB POSTED</title>
        </head>
        <body>
        <p>Your Job is Successfully posted!!!</p>
        Soon It Will be published Through our website. You Can Manage The Job Content Later on Manage Job section .
        <table>
        <tr>
        <th>Thank YOU</th>
        </tr>
        <tr>
        <th>FROM: Job Application Team</th>
        </tr>
        </table>
        </body>
        </html>
";
// $headers[] = 'MIME-Version: 1.0';
// $headers[] = 'Content-type: text/html; charset=iso-8859-1';
// $headers .= 'From: <susant.vanu7278@gmail.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,implode("\r\n", $headers));

 ?>
</body>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
