<?php
include_once('../config.php');
session_start();
if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
$q = mysqli_query($db1,"select * from mst_user join mast_customer on mst_user.id=mast_customer.user_id WHERE mast_customer.id = $_GET[jsid]");
$row=mysqli_fetch_assoc($q);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>view Jobseeker</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <style type="text/css">
        #insidenav{
            background: #dd4814;
            color: white;
            font-size: 13px;
        }
        nav a{
            font-size: 16px;
            font-family: ubuntu;
            color: white;
        }
        nav ul li {
            font-size: 16px;
            font-family: ubuntu;
        }
        nav ul li.active{
            background: whitesmoke;
        }
        nav ul li.active a{
            color:#dd4814;;
        }
        table.table{
            background: transparent;
        }
        td.tbold{
            font-weight: bold;
        }
        table{
            background: transparent;
        }
        #viewmain{
            margin-top: 30px;
        }
        span.badge{
            background: white;
            color: black;
        }

 .thumbnail {
    width: 100;
    height: 100;
   background: transparent;
   border:none;

}

.thumbnail img-circle {
    display: block;
    width: 100;
    height: 100;
    border:none;

}
    </style>
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
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">View Jobseeker Profile</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Add Ads</a></li>
                        <li><a href="#">Manage Ads</a></li>
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
<body>
<div class="container-fluid" id="content">
<!-- ---------------------------------------------- nav ends ----------------------------------------------------------------------------->

    <aside class="col-sm-3" role="complementary">
        <div class="region region-sidebar-first well" id="sidebar">
            <h3 style="color: #009999" class="text-center" > User:<?php echo " ".$row['name_user']; ?> </h3>
        </div>

        <!-- profile pic -->

    <div class="thumbnail text-center">
        <div class="img thumbnail">
           <?php if($row['photo']!="") {
              echo "<img src = '../uploads/images/".$row['photo']."' >";
             }else echo" <img src='../images/user_fallback.png'>";
           ?>
        </div>
         <strong><?php echo $row['cust_name']; ?> </strong>

            <p> <?php if($row['CV']!="") {
                    echo "<a href = '../uploads/resume/".$row['CV']."'class='btn bg-primary' style='color:white;'>
                    Download Resume File </a >";
                }?>
                <!-- profile pic --->
    </aside>

    <div class="col-sm-7">
        <div id="details"  style="margin-top: 50px;">
            <h3> User Details:</h3>
            <table class="table" >
                <tr >
                    <td class="tbold">Full Name:</td>
                    <td><?php echo $row['cust_name']; ?></td>

                </tr>
                <tr>
                    <td class="tbold">Email:</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Phone:</td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Address:</td>
                    <td><?php echo $row['address']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Experience (Years):</td>
                    <td><?php echo $row['experience']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Skills:</td>
                    <td><?php echo $row['skills']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">UG Qualification:</td>
                    <td><?php echo $row['basic_edu']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">PG Qualification:</td>
                    <td><?php echo $row['master_edu']; ?></td>
                </tr>
            </table>
        </div> <!-- profile -->
				<button class="btn btn-warning" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Manage Applicants</button>

    </div>
</div>

</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
