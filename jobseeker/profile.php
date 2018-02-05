<?php
include_once('../config.php');
session_start();
$id = $_SESSION['id'];
if(isset($_SESSION['id'])&& ($_SESSION['type']="j"))
{
    $q = "select * from mst_user join mast_customer on mst_user.id=mast_customer.user_id WHERE mst_user.id = $id";
    $result = mysqli_query($db1, $q);
    $row = mysqli_fetch_array($result);
    $_SESSION['jsname']=$row['cust_name'];
    $_SESSION['jsid']=$row['id'];
}
else
{
    header('location:../login.php?msg=please_login');
}
?>
<!DOCTYPE HTML>
<html>
<head>

<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Profile - <?php echo $row['name_user']; ?></title>
    <script type="text/javascript">
        function advsearch() {
            var experience=document.getElementById("experience").value;
            var qual=document.getElementById("qual").value;
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("subcontent").innerHTML = "Searching..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("subcontent").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("subcontent").innerHTML = "Error Occurred. <a href='profile.php'>Reload Or Try Again</a> the page.";
                }
            }
            xmlhttp.open("GET", "adv_search.php?exp=" + experience +"&qual=" + qual, true);
            xmlhttp.send();
        }
    </script>
</head>
<body >

<div id="nav">
    <nav class="navbar">
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="profile.php">Profile<span class="sr-only">(current)</span></a></li>
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

<!------------------------------------------------------------------------------- -->
<div class="container-fluid" id="content">

<aside class="col-sm-3" role="complementary">
    <div class="region region-sidebar-first well" id="sidebar">
     <h3 style="color: #009999" class="text-center" > Welcome <?php echo $row['name_user']; ?> </h3>
     </div>

  <!-- profile pic -->
    <div class="thumbnail text-center">
        <div class="thumbnail img ">
           <?php if($row['photo']!="") {
              echo "<img src = '../uploads/images/".$row['photo']."' >";
             }else echo" <img src='../images/user_fallback.png'>";
           ?>
        </div>
         <strong><?php echo $row['cust_name']; ?> </strong>
          <!-- Button trigger modal -->
          <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#changeimg">Change Image </button></a>
<!--------------------------- profile pic --------------------------------------- -->
<div class="modal fade" id="changeimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change or upload your profile image</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="../upload.php?type=image" enctype="multipart/form-data">
            <div class="form-group form-inline">
                <label for="file" class="control-label">Select your photo:</label>
                <input type=file name="file" id="file" class="form-control">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- profile pic -->

</aside>

    <!------------------------------------------------------------------------------- -->
<section class="col-sm-7">
<div id="searchcontent">
<!-- Search content overlay div starts here --------------------------------------- -->
<div id="header">
<h3> Find jobs, edit your profile or update your current resume for better jobs!</h3>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#details">Your Profile</a></li>
    <!--<li><a data-toggle="tab"  href="#recjobs">Recommended Jobs</a></li>-->
    <li><a data-toggle="tab" href="#resume">Update Resume</a></li>
    <li><a data-toggle="tab" href="#advsearch">Job Search</a></li>
</ul>

<!------------------------------------------------------------------------------- -->

    <div class="tab-content">

<!------------------------------------------------------------------------------- -->

        <div id="details" class="tab-pane fade in active" style="margin-top: 50px;">
        <h3> Your Profile</h3>
        <table class="table" >
        <tr>
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
            <td class="tbold">Location:</td>
            <td><?php echo $row['city']." , ".$row['state']." , ".$row['country']; ?></td>
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
    <!------------------------------------------------------------------------------- -->

<!--------------------------------- Resume ---------------------------------------------- -->

    <div id="resume" class="tab-pane fade">
        <div>
    <form action="../upload.php?type=file" enctype="multipart/form-data" method="post">
       <?php if($row['CV']==""){
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have'nt uploaded a resume file yet! Upload a attractive resume file for a better job!</p>
        </div>";
}?>

        <h4>Upload your updated resume file:</h4>
        <hr style="background-color: darkslateblue;">
        <div class="form-group" align="center">
            <label class="form-group col-sm-3" for="file" style="font-size:16px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select your CV:</label>
             <div class="col-sm-7 form-inline">
                 <input type="file" name="file" id="resumefile" class="form-control"> <br><br>
                 <button class="btn btn-success" type="submit" name="submit" value="submit">Upload Resume</button>
             </div>
        </div>
    </form>
        <div class="page-header"></div>
        <?php if($row['CV']!="") {
                echo "<div align='center'><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = '../uploads/resume/".$row['CV']."' class='btn bg-primary' style='color:white;' > Download Current Resume File </a ></div>";
         }?>

        <br>

    </div>
    </div> <!-- resume -->
    <!------------------------------------------------------------------------------- -->

    <div id="advsearch" class="tab-pane fade">
       <div class="container-fluid" id="advsearch" >
           <h2>Search for jobs</h2>
           <form role="form">
              <table>
                  <tr >
                    <td class="tbold">By Experience:</td>
                    <td>
                      <div class="dropdown">
                          <select name="experience" class="form-control" id="experience" required>
                              <option value="">select </option>
                              <option value="Fresher">Fresher </option>
                              <option value="1-2">1-2 years </option>
                              <option value="3-5">3-5 years </option>
                              <option value="5+">5+ years </option>
                       </select>
                     </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="tbold">By Qualification:</td>
                    <td>
                      <div class="dropdown"> <select name="ugcourse" id="qual" class=" form-control" required>
                                 <option value="" label="Select">Select</option>
                                 <optgroup label="Under-Graduate">
                                   <option value="Not Pursuing Graduation"> Not Pursuing Graduation</option>
                                   <option value="B.A">B.A</option>
                                   <option value="B.Arch">B.Arch</option>
                                   <option value="BCA">BCA</option>
                                   <option value="B.B.A">B.B.A</option>
                                   <option value="B.Com">B.Com</option>
                                   <option value="B.Ed">B.Ed</option>
                                   <option value="BDS">BDS</option>
                                   <option value="BHM">BHM</option>
                                   <option value="B.Pharma">B.Pharma</option>
                                   <option value="B.Sc">B.Sc</option>
                                   <option value="B.Tech/B.E.">B.Tech/B.E.</option>
                                   <option value="LLB">LLB</option>
                                   <option value="MBBS">MBBS</option>
                                   <option value="Diploma">Diploma</option>
                                   <option value="BVSC">BVSC</option>
                                   <option value="Other">Other</option>
                                 </optgroup>
                                 <optgroup label="Post-Graduate">
                                   <option value="CA">CA</option>
                                   <option value="CS">CS</option>
                                   <option value="ICWA (CMA)">ICWA (CMA)</option>
                                   <option value="Integrated PG">Integrated PG</option>
                                   <option value="LLM">LLM</option>
                                   <option value="M.A">M.A</option>
                                   <option value="M.Arch">M.Arch</option>
                                   <option value="M.Com">M.Com</option>
                                   <option value="M.Ed">M.Ed</option>
                                   <option value="M.Pharma">M.Pharma</option>
                                   <option value="M.Sc">M.Sc</option>
                                   <option value="M.Tech">M.Tech</option>
                                   <option value="MBA/PGDM">MBA/PGDM</option>
                                   <option value="MCA">MCA</option>
                                   <option value="MS">MS</option>
                                   <option value="PG Diploma">PG Diploma</option>
                                   <option value="MVSC">MVSC</option>
                                   <option value="MCM">MCM</option>
                                   <option value="Other">Other</option>
                                 </optgroup>
                                 </select>
                         </div>
                    </td>
                  </tr>
                  <tr>
                      <td></td>
                      <td><button type="button" onclick="advsearch()" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search Jobs</button></td>
                  </tr>
              </table>
           </form>
       </div>
        <hr>
        <div id="subcontent">
        <!---- sub content shows advanced search results --------- -->
        </div>
    </div>
<!------------------------------------------------------------------------------- -->
</div> <!-- tab contents -->

</div><!-- closing searchcontent -->
</section> <!-- section 2 ends here -->

</div> <!-- main content div -->

</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="search.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
