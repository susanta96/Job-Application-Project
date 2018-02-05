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
// echo $_SESSION['jsid'];
// echo $_SESSION['id'];
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

<title>Update Profile - <?php echo $row['name_user']; ?></title>
</head>
<body>

<div id="nav">
    <nav class="navbar">
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Application</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="profile.php"><?php echo $row['name_user']; ?><span class="sr-only">(current)</span></a></li>
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
                        <li><a href="#">Update Profile</a></li>
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

    <div class="container">
      <div class="jumbotron" align="center">
          <h1>Update Your Profile</h1>
      </div>

<form id="reguser" onsubmit="return checkForm()" METHOD="post" ACTION="process_update_profile.php" enctype="multipart/form-data" class="form-horizontal">

  <div class="page-header"></div>
  <h3 class="h3style">Update Your Information</h3>

  <div class="form-group">
       <label class="control-label col-sm-3" for="name">Update your Full Name:</label>
               <div class="col-sm-4">
                   <input type="text" id="uname" placeholder="Your Name" name="uname" class="form-control"
                   required onblur="validate('username','nameerror',this.value)">
               </div>
        <label id="nameerror" class="error"></label>
   </div>
   <div class="form-group">
       <label class="control-label col-sm-3" for="address"> Update Address: </label>
           <div class="form-inline col-sm-7">
                  <input type="text" id="address" placeholder="Building No." name="BuildId" class="form-control" style="width:100px;" required onblur="validate('buildno','buildnoerror',this.value)">

                   <input type="text" id="address" placeholder="Street Name" name="StreetId" class="form-control" style="width:200px;" required onblur="validate('streetname','streetnameerror',this.value)">

                   <input type="number" id="address" placeholder="Pincode" name="Pin" class="form-control" style="width:100px;" required onblur="validate('pinno','pinnoerror',this.value)">
                   <label id="buildnoerror" class="error"></label>
                   <label id="streetnameerror" class="error"></label>
                   <label id="pinnoerror" class="error"></label>
           </div>
         </div>
           <div class="form-group">
               <label class="control-label col-sm-3" for="mobno">Update your Mobile number:</label>
                           <div class="form-inline col-sm-3">
                           <input type="text" name="mobno" placeholder=" Mobile number" class="form-control" id="mobno" required onblur="validate('mobilenum','mobnoerror',this.value)">
                           </div>
                           <label id="mobnoerror" class="error"></label>
                </div>
          <div class="form-group">
              <label class="control-label col-sm-3" for="Location"> Update Location: </label>
                  <div class="form-inline col-sm-7" >
                         <input type="text" id="Location" placeholder="Country" name="Country" class="form-control" style="width:130px;" required onblur="validate('country','countryerror',this.value)">
                         <input type="text" id="Location" placeholder="State" name="State" class="form-control" style="width:130px;" required onblur="validate('state','stateerror',this.value)">
                          <input type="text" id="Location" placeholder="City" name="City" class="form-control" style="width:130px;" required onblur="validate('city','cityerror',this.value)">
                          <label id="countryerror" class="error"></label>
                          <label id="stateerror" class="error"></label>
                          <label id="cityerror" class="error"></label>
                  </div>
          </div>
          <div class="page-header"></div>
          <h3 class="h3style"> Update Your Employment Details </h3>

          <div class="form-group">
              <label for="experience" class="control-label col-sm-3"> Update your experience :</label>
                  <div class="col-sm-4">
                      <select name="experience" class="form-control" id="experience" required>
                          <option value="">select </option>
                          <option value="Fresher /0 yr">Fresher </option>
                          <option value="1-2 yr">1-2 years </option>
                          <option value="3-5 yr">3-5 years </option>
                          <option value="5+ yr">5+ years </option>
                   </select>
                 </div>
          </div>

          <div class="form-group">
              <label class="control-label col-sm-3" for="skills">Update your Key Skills:</label>
                  <div class="col-sm-4"><input type="text" name="skills" placeholder="Skills" class="form-control" name="skills" id="skills"
                  required onblur="validate('text','skillerror',this.value)">
                  </div>
                  <label id="skillerror" class="error"></label>
          </div>
          <div class="page-header"></div>
          <h3 class="h3style"> Update Your Educational Qualifications </h3>
          <div class="form-group">
              <label class="control-label col-sm-3" for="ugcourse"> Update Your Basic Degree: </label>
               <div class="col-sm-4"> <select name="ugcourse" id="ugcourse" class=" form-control" required>
                          <option value="" label="Select">Select</option>
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
                          </select>
                  </div>
           </div>

           <div class="form-group">
              <label class="control-label col-sm-3" for="pgcourse"> Update your Master Degree:</label>
                  <div class="col-sm-4"> <select name="pgcourse" id="pgcourse"  class="form-control" required>
                                      <option value="" label="Select">Select</option>
                                      <option value="Not Pursuing Post Graduation"> Not Post Pursuing Post Graduation</option>
                                      <option value="CA">CA</option>
                                      <option value="CS">CS</option>
                                      <option value="MCA">MCA</option>
                                      <option value="ICWA (CMA)">ICWA (CMA)</option>
                                      <option value="Integrated PG">Integrated PG</option>
                                      <option value="LLM">LLM</option>
                                      <option value="M.A">M.A</option>
                                      <option value="M.Arch">M.Arch</option>
                                      <option value="M.Com">M.Com</option>
                                      <option value="M.Ed">M.Ed</option>
                                      <option value="M.Pharma">M.Pharma</option>
                                      <option value="M.Sc">M.Sc</option>
                                      <option value="M.Tech">M.Tech/M.E</option>
                                      <option value="MBA/PGDM">MBA/PGDM</option>
                                      <option value="MS">MS</option>
                                      <option value="PG Diploma">PG Diploma</option>
                                      <option value="MVSC">MVSC</option>
                                      <option value="Other">Other</option>
                                  </select>
                    </div>
          </div>
          <div class="page-header"> </div>

                  <div class="form-group form-inline col-sm-10">

                  <button class="btn btn-success" type="submit"  id="reg" value="submit">Update Profile</button>
                  <label class="col-sm-2"></label>
                  <button class="btn btn-danger" type="reset" id="reset"> Reset </button>

          </div>
  </form>

<script type="text/javascript" src="../js/validate.js"></script>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
        function checkForm() {

            // Fetching values from all input fields and storing them in variables.
            var name = document.getElementById("nameerror").innerHTML;
            var address1 = document.getElementById("buildnoerror").innerHTML;
            var address2 = document.getElementById("streetnameerror").innerHTML;
            var address3 = document.getElementById("pinnoerror").innerHTML;
            var mobno = document.getElementById("mobnoerror").innerHTML;
            var location1 = document.getElementById("countryerror").innerHTML;
            var location2 = document.getElementById("stateerror").innerHTML;
            var location3 = document.getElementById("cityerror").innerHTML;
            var skills = document.getElementById("skillerror").innerHTML;
            //Check input Fields Should not be blanks.

            if(name == "" && address1 == "" && address2 == "" && address3 == "" && mobno == '' && skills =='') {

                                 return true;
            }
            else {
            alert("Fill in with correct information");
                                 return false;

            }
        }
 </script>
</body>
</html>
