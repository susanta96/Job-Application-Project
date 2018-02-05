<?php
include_once('../config.php');
session_start();
$jobid=$_GET['jid'];
$query=mysqli_query($db1,"select * from trans_ads where id = $jobid");
$result=mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<META HTTP-EQUIV="refresh" CONTENT="15">
<head>
	<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/employer.css" rel="stylesheet">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
    function deletejob(jobid) {
    // alert(keyword);
    var xmlhttp;
    if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else { // for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
    document.getElementById("tablecontent").innerHTML = "Processing..";
    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("tablecontent").innerHTML = xmlhttp.responseText;
    } else {
    document.getElementById("tablecontent").innerHTML = "Error Occurred. <a href='managejobs.php'>Reload Or Try Again</a> the page.";
    }
    }
    xmlhttp.open("GET", "deletejob.php?jid=" + jobid , true);
    xmlhttp.send();
    }
    </script>
    <title> View Jobs </title>
</head>
<body>

<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">View Jobs</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Add Ads</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="managejobs.php">Manage Ads</a></li>

                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="edit_profile.php">Edit Profile</a></li>
												<li role="separator" class="divider"></li>
												<li><a href="change_pass.php">Change Password</a></li>
                    </ul>
                </li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->


<div class="container">
    <center><h2>View Jobs </h2></center>
    <div class="page-header" style="background: #f4511e"></div>
    <button class="btn btn-warning" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Manage Jobs</button>

<div id="tablecontent">
    <h3> Job Details: </h3>
    <table class="table table-responsive">
        <tr>
            <td class="tbold">Designation:</td>
            <td><?php echo $result['title']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Date of Posting:</td>
            <td><?php echo $result['postdate']; ?></td>
        </tr>

        <tr>
            <td class="tbold">Job Description:</td>
            <td><?php echo $result['Description']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required Experience:</td>
            <td><?php echo $result['Exp_required']." "; ?>Years</td>
        </tr>
        <tr>
            <td class="tbold">Salary:</td>
            <td><?php echo $result['Salary']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Job Category:</td>
            <td><?php echo $result['Job_category']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required UG Qualification:</td>
            <td><?php echo $result['ugqual']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required PG Qualification:</td>
            <td><?php echo $result['pgqual']; ?></td>
        </tr>

    </table>
<table class="table">
    <tr>
        <td>
            <button type="button" class="btn btn-danger" onclick="deletejob(<?php echo $result['id']; ?>)">
                <span class='glyphicon glyphicon-trash'></span> Delete Job
            </button>
        </td>
    </tr>
</table>
</div> <!-- table content -->
    <div class="page-header" />

</div>
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
