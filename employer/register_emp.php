<?php
	session_start();
		if(!isset($_SESSION['user_id'])){
			header('location: ../basic_reg.php?msg=first_reg_basic');
		}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/employer.css" rel="stylesheet">
<title> Complete Profile</title>
</head>
<body>

<!-- navigation bar starts here -->
<nav class="navbar" id="insidenav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Job Application</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Employer Registration</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<!-- navigation bar ends here -->

<!-- container div for page contents -->
<div class="container">
    <div class="jumbotron">
       <h1>Register your company</h1>
        <div id="insidejumb">
        <p>
            Register today and post a job in easy steps and start receiving applications the same day.
            Find the right candidates easily and quickly through our  service.
        </p>
        </div>
    </div>
<form role="form" id="regcomp" onsubmit="return checkForm()" class="form-horizontal" method="post" action="process_emp.php">

<div class="page-header"></div>
<h3 class="h3style"> Your Company Details</h3>
<div class="page-header"></div>

<div class="form-group">
  <label class="control-label col-sm-2"> Company Name:</label>
    <div class="col-sm-5">
      <input type ="text" class="form-control" name="compname" id="compname" placeholder="Enter Company Name"
             required onblur="validate('company','comperror',this.value)">
   </div>
    <label class="error" id="comperror"></label>
</div>


<div class="form-group">
    <label for="addr" class="control-label col-sm-2">Address:</label>
      <div class="col-sm-5"><textarea id="addr" rows="5" name="addr" class="form-control" required
          onblur="validate('address','addrerror',this.value)"></textarea>
    </div>
      <label class="error" id="addrerror"></label>
</div>

<div class="form-group">
      <label for="pincode" class="control-label col-sm-2">Pincode:</label>
       <div class="col-sm-4">
          <input type ="text" class="form-control" placeholder="Enter the pincode" name="pin_code" id="pin_code" required style="width:200px" onblur="validate('pincode','pinerror',this.value)">
       </div>
      <label class="error" id="pinerror"></label>
</div>


<div class="form-group">
    <label class="control-label col-sm-2" for="city"> Location: </label>

    <div class="form-inline col-sm-5">
		<input type ="text" class="form-control" name="city" id="city" placeholder="City" style="width:160px;" required onblur="validate('city','cityerror',this.value)">
		<input type ="text" class="form-control" name="country" id="country" placeholder="Country" style="width:180px;" required onblur="validate('country','countryerror',this.value)">
		<label id="cityerror" class="error"></label>
		<label id="countryerror" class="error"></label>

   </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="website"> Website:</label>
    <div class="col-sm-5">
      <input type ="text" class="form-control" name="website" id="website" placeholder="Enter Website" style="width:350px"
             required onblur="validate('website','weberror',this.value)">
   </div>
    <label class="error" id="weberror"></label>
</div>
<div class="form-group">
        <label class="control-label col-sm-2">About Company:</label>
        <div class="col-sm-5">
            <textarea placeholder="Describe your company" name="about"class="form-control" rows="5" required onblur="validate('longtext','abouterror',this.value)"></textarea>
            <label class="error" id="abouterror"></label>
        </div>
    </div>

    <div class="page-header"> </div>
   <div class="form-group form-inline col-sm-10">

    <button class="btn btn-success" type="submit"  id="reg">Create Profile</button>
    <label for"reset" class="col-sm-2"> </label>
     <button class="btn btn-danger" type="reset" id="reset"> Reset </button>
</div>
</form>
</div>
<div class="page-header"> </div>

<script src="../Job_Application/js/jquery-1.12.0.min.js"></script>
<script src="../Job_Application/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Job_Application/js/validate.js"></script>
         <script>
             function checkForm() {
// Fetching values from all input fields and storing them in variables.
var compname = document.getElementById("comperror").innerHTML;
var addr = document.getElementById("addrerror").innerHTML;
var pincode = document.getElementById("pinerror").innerHTML;
var city = document.getElementById("cityerror").innerHTML;
var country = document.getElementById("countryerror").innerHTML;
var website = document.getElementById("weberror").innerHTML;
//alert( compname + addr + pincode + city +country + website);
//Check input Fields Should not be blanks.
//validateRadio("comtype","typeerror");

if(compname == "" && addr == "" && pincode == "" && city == "" && country == "" && website == "") {

   //document.getElementById("regcomp").submit();
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
