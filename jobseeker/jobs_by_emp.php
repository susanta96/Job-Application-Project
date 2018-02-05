<?php
session_start();
include_once('../config.php');
$query=mysqli_query($db1,"select * from trans_ads where e_id = $_GET[eid]");
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
    <title>View All Jobs</title>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>

                <li class="active"><a href="#">Jobs of <?php echo $_GET['ename']; ?> </a></li>
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
											<li><a href="#">Change Password</a></li>

                    </ul>
                </li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->

<body>
<div class="container" id="viewmain">
    <br>
    <br>
    <h3>All Jobs of <?php echo $_GET['ename']; ?></h3><br>
    <button class="btn btn-warning" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
	<div class="table-responsive">
    <table class="table table-responsive" style="margin-top: 30px;">
        <th>Job Title</th>
        <th>Job Description</th>
        <th>Date of Posting</th>
        <th colspan="3">Actions</th>
        <?php
        while($result=mysqli_fetch_array($query)){
            echo "<tr> ";
            echo "<td>".$result['title']."</td>";
            echo "<td>".substr($result['Description'],0,120)." ........</td>";
            echo "<td>".$result['postdate']."</td>";
            echo "<td> <a style='color: whitesmoke;'  href='view_jobs.php?jid=".$result['id']."'> <button type='button' class='btn btn-success'>View Job</button></a> </td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
</div>
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
