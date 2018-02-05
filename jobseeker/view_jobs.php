<?php
include_once('../config.php');
session_start();
if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
$jobid=$_GET['jid'];
$query=mysqli_query($db1,"select * from trans_ads where id =".$jobid);
//$query=mysqli_query($db1,"select * from trans_ads join trans_apply where trans_ads.id = trans_apply.adv_id");
$result=mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
		<link href="../css/main.css" rel="stylesheet">
		<link href="../css/jobseeker.css" rel="stylesheet">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
    function apply(jobid) {
    var xmlhttp;
    if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else { // for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
    document.getElementById("applydiv").innerHTML = "Processing..";
    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("applydiv").innerHTML = xmlhttp.responseText;
    } else {
    document.getElementById("applydiv").innerHTML = "Error Occurred. <a href='profile.php'>Reload Or Try Again</a> the page.";
    }
    }
    xmlhttp.open("GET", "apply_job.php?jid=" + jobid , true);
    xmlhttp.send();
    }
    </script>
    <title>View Job </title>
</head>
<body>

<div id="nav">
    <nav class="navbar-fixed-top">
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#"> View Job </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="view_applied.php">View Applied Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="view_selected.php">View Selected Jobs</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
											<li><a href="update_profile.php">Update Profile</a></li>
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
<?php
    $qc=mysqli_query($db1,"select * from mast_company join trans_ads where mast_company.id = trans_ads.e_id and trans_ads.id=".$jobid);
    $res=mysqli_fetch_array($qc);
?>


<h3>Details of <?php echo $result['title']; ?> by <?php echo $res['Company_name']; ?> </h3>

<div id="applydiv"></div>
<div class="page-header" style="background: midnightblue"></div>

<div id="tablecontent">
    <h3> Job Details: </h3>

    <table class="table table-responsive">
        <tr>
            <td class="tbold"> Company: </td>
            <td> <?php echo "<a href='view_emp.php?id=".$result['e_id']."'>".$res['Company_name']."</a>"; ?></td>
        </tr>
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
            <td><?php echo $result['Exp_required']." "; ?></td>
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
            <td class="tbold"> Location:</td>
            <td><?php echo $res['City'].", ".$res['Country']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Basic Required Qualification:</td>
            <td><?php echo $result['ugqual']; ?></td>

        </tr>
				<tr>
					<td class="tbold">Higher Qualification:</td>
					<td><?php echo $result['pgqual']; ?></td>
				</tr>
        <tr>
            <td class="tbold">Website:</td>
            <td><?php echo $res['Website']; ?></td>
        </tr>

</table>
<div class="page-header" />

<button class="btn btn-warning btn-lg" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span> Back </button>
<button type="button" class="btn btn-success btn-lg" onclick="apply(<?php echo $jobid; ?>)">
	<span class='glyphicon glyphicon-ok'></span> Apply for this Job
</button>

</div>
</body>


<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
