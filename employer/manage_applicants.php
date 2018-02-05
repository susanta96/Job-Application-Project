<?php
include_once('../config.php');
session_start();
$q1=mysqli_query($db1,"select * from trans_apply where adv_id=$_GET[jobid]");
$q3=mysqli_query($db1,"select * from trans_ads where id = $_GET[jobid]");
$q3row=mysqli_fetch_array($q3);
$emp_id=$_SESSION['e_id'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
		<link href="../css/main.css" rel="stylesheet">
		<link href="../css/employer.css" rel="stylesheet">
    <title>Manage Jobs</title>
		<script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
        function selectJs(user,job,emp) {
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = "Processing Request..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = xmlhttp.responseText;
                } else {
                    //document.getElementById("message").innerHTML = "Error Occurred. <a href='manage_applicants.php?jobid='>Reload Or Try Again</a> the page.";
                }
            }
            xmlhttp.open("GET", "process_select.php?user=" + user +"&job="+job + "&emp="+emp, true);
            xmlhttp.send();
        }
        function rejectJs(user,job,emp) {
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = "Processing Request..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("message").innerHTML = "Error Occurred. <a href='manage_applicants.php?jobid='>Reload Or Try Again</a> the page.";
                }
            }
            xmlhttp.open("GET", "process_reject.php?user=" + user +"&job="+job + "&emp="+emp, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>

<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">View Applicants</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Add Ads</a></li>
                        <li><a href="managejobs.php">Manage Ads</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Manage Applicants</a></li>
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

<!-- ----------------------------------------- contents -------------------------------------------------------------------------- -->
<div class="container-fluid">
    <h3 class="text-center" style="margin-top: 50px;">These users have applied for the job : <?php echo $q3row['title'];?></h3>
    <h4 class="text-center">You can view their profile, select or reject them.</h4>
    <div class="page-header" style="background: steelblue"></div>
		<button class="btn btn-warning" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Manage Jobs</button>
    <?php if(mysqli_num_rows($q1)>0) { ?>
		<div class="table-responsive">
        <table class="table table-responsive" style="margin-top: 30px;">
            <th>SI NO:</th>
            <th>Full Name:</th>
            <th>Qualification</th>
            <th>Skills</th>
            <th>Applied Date</th>
            <th colspan="2">Actions</th>
            <?php
            while($row=mysqli_fetch_array($q1)) {
                $i=1;
                $user_id=$row['user_id'];
                $q2=mysqli_query($db1,"select * from mast_customer where id = $user_id");

                while ( $result = mysqli_fetch_array($q2) ) {
                    $qsel=mysqli_query($db1,"select * from selection where job_id=$_GET[jobid] and cust_id= $result[id]");
                    $ressel=mysqli_fetch_array($qsel);
                    echo " <tr> ";
                    echo "<td>".$i."</td>";
                    echo "<td> <a href='view_js.php?jsid=" . $result['id'] . "'>".$result['cust_name']."</a></td>";
                    echo "<td> <b>Basic Education: </b> " . $result['basic_edu'].",  <b>Master's Education: </b> ".$result['master_edu']."</td>";
                    echo "<td>" . $result['skills'] . "</td>";
                    echo "<td>" . $row['apply_date']."</td>";
                    if(mysqli_num_rows($qsel)==0) {
                        echo "<td> <button type='button' class='btn btn-success' onclick='selectJs(" . $user_id . "," . $_GET['jobid'] . "," . $emp_id . ");'>Select Candidate</button> </td>";
                        echo "<td> <button type='button' class='btn btn-danger' onclick='rejectJs(" . $user_id . "," . $_GET['jobid'] . "," . $emp_id . ");'>Reject Candidate</button> </td>";
                    }
                    else {
                        $qrej=mysqli_query($db1,"select * from trans_apply where adv_id=$_GET[jobid] and user_id= $result[id] ");
                        $rowrej=mysqli_fetch_array($qrej);
                        	if($rowrej['status']==2){
                            echo "<td> <h4 style='color: red'>Rejected</h4> </td>";
													}else{
                        echo "<td> <h4 style='color: green'>Selected</h4> </td>";
                    }
										}
                    echo "<tr><td colspan='6'><div id='message'></div></td></tr>";
                    echo "</tr>";
                }
                $i++;
            }
            ?>
        </table>
        </div>
    <?php } else {  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Note:</strong> No one applied for this job yet!</p>
        </div> </div>";
    }
    ?>
</div>
<!-- --------------------------------------------------------- contents end --------------------------------------------------------------------- -->
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
