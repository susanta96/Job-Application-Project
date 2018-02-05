<?php
session_start();
include_once('../config.php');
$empid=$_GET['id'];
$query=mysqli_query($db1,"select * from mast_company where id = $empid");
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
    <title>View Employer</title>
</head>
<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>

                <li class="active"><a href="#"> View Employer </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="#">View Applied Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">View Selected Jobs</a></li>
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

<!-- left side info and logo ---------------------------------- -->
 <aside class="col-sm-3 text-center" role="complementary">
        <div class="thumbnail text-center">
            <?php if($result['logo']!="") {
                echo "<img src = '../uploads/logo/".$result['logo']."' class='img-rounded' >";
            }else echo" <img src='../images/fallbacklogo.jpg'>";
            ?>
            <strong><?php echo $result['Company_name']; ?></strong><br> <br>
            </strong> &nbsp;&nbsp;
            <a class="btn btn-primary btn-block" href="jobs_by_emp.php?eid=<?php echo $empid; ?>&ename=<?php echo $result['Company_name']; ?>"
             style="font-size: 16px;"> View All jobs of <?php echo $result['Company_name']; ?> </a>
        </div>
    </aside>
<!-- left side info ends here ---------------------------------- -->

<!-- right side section ------------------- starts here ------------------- -->
<section class="col-sm-9">
<div class="container" style="margin-top: 30px;" id="tablecontent">

    <h2 style="text-align:center">Employer: <?php echo $result['Company_name']; ?></h2>
    <div class='page-header' style='background:skyblue'></div>

<table class="table table-responsive">
    <tr>
        <td class="tbold">Employer Name:</td>
        <td><strong><?php echo $result['Company_name']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Address:</td>
        <td><?php echo $result['Address']; ?></td>
    </tr>
		<tr>
        <td class="tbold">City:</td>
        <td><?php echo $result['City']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Pincode:</td>
        <td><?php echo $result['Zip']; ?></td>
    </tr>

    <tr>
        <td class="tbold">Website:</td>
        <td><?php echo $result['Website']; ?></td>
    </tr>
    <tr>
        <td class="tbold">About Company:</td>
        <td><?php echo $result['Profile']; ?></td>
    </tr>
</table>


</div>
</div> <!-- container -->
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
