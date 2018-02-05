<?php

session_start();
include_once('../config.php');

if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
else
{
  $eid = $_SESSION['id'];
  $q = "select * from mst_user join mast_company on mst_user.id=mast_company.user_id WHERE mst_user.id = $eid";
  //echo $q;
  $result = mysqli_query($db1, $q);// or die("Selecting user profile failed");
  $row = mysqli_fetch_assoc($result);
  //  echo $row['id'];
      $_SESSION['e_id']=$row['id'];
      $_SESSION['name']=$row['Company_name'];

}
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



    <title>Welcome <?php echo $_SESSION['name']; ?></title>
</head>
<body>

<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">

            <ul class="nav navbar-nav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Job Application</a>
                </div>
                <li class="active"><a href="#">Profile<span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Add Adds</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="managejobs.php">Manage Adds</a></li>

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
<div class="container-fluid" id="content">

    <aside class="col-sm-3 text-center" role="complementary">
        <div class="region region-sidebar-first well" id="sidebar">
            <h3 class="text-center" style="color: #dd4814"> Welcome <?php echo $row['Company_name']; ?> </h3> <hr>
            <h4 style="color: red;"></h4>
            <h4> You can post a new job, manage your jobs and update your profile.</h4>
        </div>
        <div class="thumbnail text-center">
              <div class="img thumbnail">
            <?php if($row['logo']!="") {
                echo "<img src = '../uploads/logo/".$row['logo']."'>";
            }else echo" <img src='../images/fallbacklogo.jpg'>";
            ?>
          </div>

            <strong><?php echo $row['Company_name']; ?></strong><br>
            <p><button class="btn btn-default" data-toggle="modal" data-target="#changelogo">Change Company Logo
        </div>
<!------------- logo ------------------------------------- -->
   <div class="modal fade" id="changelogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change or Upload your Company Logo</h4>
      </div>
      <form method="post" action="../upload.php?type=logo" enctype="multipart/form-data">
      <div class="modal-body">
            <div class="form-group form-inline">
                <label for="file" class="control-label">Select your Logo:</label>
                <input type=file name="file" id="file" class="form-control">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ----------- change logo ends here ------------------------------------------------- -->
    </aside>
    <section class="col-sm-7">
    <div id="header">
        <h3> Post jobs and find the right candidates!</h3>
    </div>
<div id="details" class="container-wrap" style="margin-top: 50px;">
    <h3>Company Profile:</h3> <h4>The following informations are visible to job seekers.
        We reccomend you to always update these informations.</h4>
    <hr>
    <table class="table">
        <tr>
            <td class="tbold">Name:</td>
            <td><strong><?php echo $row['Company_name']; ?></strong></td>
        </tr>
        <tr>
            <td class="tbold">Address:</td>
            <td><?php echo $row['Address']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Pincode:</td>
            <td><?php echo $row['Zip']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Email:</td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Website:</td>
            <td><?php echo $row['Website']; ?></td>
        </tr>
        <tr>
            <td class="tbold">About Company:</td>
            <td><?php echo $row['Profile']; ?></td>
        </tr>
    </table>
    </div>
        </section>
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
