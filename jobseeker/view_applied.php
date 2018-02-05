<?php
session_start();
include_once('../config.php');
if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
$jsid=$_SESSION['jsid'];
$q1=mysqli_query($db1,"select * from trans_apply WHERE user_id=$jsid");
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
    <title>View Applied Jobs</title>
</head>
<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#"> View Applied Job </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">View Applied Jobs</a></li>
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

<body>
<div class="container">
    <h3 class="text-center" style="margin-top: 50px; color: #265a88">You Applied for these jobs</h3>
    <div class='page-header' style='background:skyblue'></div>
     <?php if(mysqli_num_rows($q1)>0) { ?>
 <table class="table table-responsive" style="margin-top: 30px;">
        <th style="width:150px">Employer</th>
        <th>Job Title</th>
        <th>Job Description</th>
        <th>Date of Posting</th>
        <th>Date on Applied</th>
        <th colspan="3">Actions</th>
        <?php
        while($row=mysqli_fetch_array($q1)) {
            $job_id=$row['adv_id'];
            $q2=mysqli_query($db1,"select * from trans_ads where id = $job_id");
            while ( $result = mysqli_fetch_array($q2) ) {

                $comp=mysqli_query($db1,"select * from mast_company WHERE id = $result[e_id]");
                $rowcomp=mysqli_fetch_array($comp);

                echo " <tr> ";
                echo "<td>"."<a href='view_emp.php?id=".$rowcomp['id']."'>".$rowcomp['Company_name']."</a>";
                echo "<td>" . $result['title'] . "</td>";
                echo "<td>" . substr($result['Description'],0,120) ." .......</td>";
                echo "<td>" . $result['postdate'] . "</td>";
                echo "<td>" . $row['apply_date']."</td>";
                echo "<td>  <a style='color: whitesmoke;'  href='view_jobs.php?jid=" . $job_id . "'><button type='button' class='btn btn-success'>View Job</button> </a></td>";
                echo "</tr>";

            }
            echo "<hr style='background:blue;'>";

        }
        ?>
</table>
    <?php } else {  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have'nt applied for any jobs yet!</p>
        </div> </div>";
        }
     ?>
</div>
</body>

<script type="text/javascript" src="../js/validate.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../location/location.js"></script>
</html>
