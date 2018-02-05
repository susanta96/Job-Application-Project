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
 <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
 <link href="../css/main.css" rel="stylesheet">
 <link href="../css/jobseeker.css" rel="stylesheet">
<title>Change Password - <?php echo $row['name_user']; ?></title>
</head>
<body>
  <div id="nav">
      <nav class="navbar">
          <div class="navbar" id="insidenav">
              <div class="navbar-header">
                  <a class="navbar-brand" href="#">Job Application</a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="profile.php"><?php echo $row['cust_name']; ?><span class="sr-only">(current)</span></a></li>
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
  <div class="container">

      <div class="container">
        <div class="jumbotron" align="center">
            <h1>Change Password</h1>
        </div>
        <form id="reguser" onsubmit="return checkForm()" METHOD="post" ACTION="process_change_pass.php" enctype="multipart/form-data" class="form-horizontal"></br>
          <div class="form-group">
              <label class="control-label col-sm-3 " for="passnew" > Create new Password:</label>
              <div class="col-sm-4">  <input type="password" id="passnew" placeholder="New Password" name="pass1" class="form-control"
                           required onblur="validate('password','passerror',this.value)">
              </div>
             <label id="passerror" class="error"></label>
         </div>
         <div class="form-group">
                 <label class="control-label col-sm-3" for="passconf"> Confirm the Password:</label>
                    <div class="col-sm-4">
                     <input type="password" id="passconf" placeholder="Confirm Password" name="pass2" class="form-control" required >
                        </div>
                        <label class="error" id="passerror2"></label>
                 </div> <br>
                 <div class="form-group form-inline col-sm-10">

                 <button class="btn btn-success" type="submit"  id="reg" value="submit" > Submit </button>
                 <label class="col-sm-2"></label>
                 <button class="btn btn-danger" type="reset" id="reset"> Reset </button>

            </div>
          </div>
          </form>
        </div>
</body>
<script src="../js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../js/validate.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
          function checkForm() {

     // Fetching values from all input fields and storing them in variables.
     var pass1 = document.getElementById("passerror").innerHTML;
     var pass2 = document.getElementById("passerror2").innerHTML;

     //Check input Fields Should not be blanks.
     var p1=document.getElementById("passnew").value;
     var p2=document.getElementById("passconf").value;
       if (p1 != p2) {
         document.getElementById("passerror2").innerHTML="Password Donot Match" ;
       }
       else
       {
         document.getElementById("passerror2").innerHTML="" ;

       }

     if( pass1 == '' && pass2 == '' ) {
       //document.getElementById("basic_reg").submit();
                return true;
     }
     else {
     alert("Fill all  with correct information");
                return false;

     }
         }
</script>
</html>
