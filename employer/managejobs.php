<?php
session_start();
include_once('../config.php');
$q="select * from trans_ads where e_id = ".$_SESSION['e_id'];
$query=mysqli_query($db1,$q);
//$result=mysqli_fetch_array($query);
//echo $result['title'];

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
    <title>Manage Ads</title>
</head>
<div id="nav">
    <nav class="emp-nav">
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">Manage Jobs</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Add Ads</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Manage Ads</a></li>
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
<body>
<h3 style="color: green; margin-top: 50px; " class="text-center">Manage Your Posted Jobs</h3>
<div class="page-header" style="background: #f4511e"></div>
<?php if(mysqli_num_rows($query)>0) { ?>
<div class="container" id="viewmain">
	<div class="table-responsive">
    <table class="table table-responsive table-striped">
        <th>Job Title</th>
        <th>Job Description</th>
        <th>Date of Posting</th>
        <th colspan="3">Actions</th>
    <?php
    while($result=mysqli_fetch_array($query)){
   // $query2=mysqli_query($db1,"select * from employer where eid = '$result[eid]'");
   // $r2=mysqli_fetch_array($query2);

    echo" <tr> ";
        /*for ($i=0; $i <3 ; $i++) {*/
        echo "<td>".$result['title']."</td>";
        echo "<td>".substr($result['Description'],0,180)." ..........</td>";
        echo "<td>".$result['postdate']."</td>";
        echo "<td>  <a style='color: whitesmoke;'  href='view.php?jid=".$result['id']."'><button type='button' class='btn btn-success'>View Job</button></a> </td>";
        echo "<td> <a style='color: whitesmoke;'  href='manage_applicants.php?jobid=".$result['id']."'><button type='button' class='btn btn-success'> View Applicants</button> </a></td>";
        echo "</tr>";
    }
?>
    </table>
    </div>
</div>
<?php } else  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 25px'><strong>Note:</strong> You have'nt posted any jobs yet!</p>
        </div> </div>";
?>
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
