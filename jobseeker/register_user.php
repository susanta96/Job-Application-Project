  <?php
    session_start();
      if(!isset($_SESSION['user_id'])){
        header('location: ../basic_reg.php?msg=first_reg_basic');
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
        <title>Complete Profile</title>
    </head>
    <body>

        <nav class="navbar" id="insidenav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Job Application</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Jobseeker Registration</a></li>

               </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
               </ul>
             </div>
         </nav>

<div class="container">

    <div class="container">
        <div class="jumbotron">
            <h1>Complete Your Profile & find Jobs</h1>
            <p>
                Helps passive and active jobseekers find better jobs. Get connected with over 4500 recruiters.<br/>
                Apply to jobs in just one click. Apply to thousands of jobs posted daily.
            </p>
        </div>

    <FORM id="reguser" onsubmit="return checkForm()" METHOD="post" ACTION="process_user.php" enctype="multipart/form-data" class="form-horizontal">



    <div class="page-header"></div>
    <h3 class="h3style">Your Information</h3>



   <div class="form-group">
        <label class="control-label col-sm-3" for="name">Mention your Full Name:</label>
                <div class="col-sm-4">
                    <input type="text" id="uname" placeholder="Your Name" name="uname" class="form-control"
                    required onblur="validate('username','nameerror',this.value)">
                </div>
         <label id="nameerror" class="error"></label>
    </div>

<div class="form-group">
    <label class="control-label col-sm-3" for="address"> Address: </label>
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
     <label class="control-label col-sm-3" for="mobno">Enter your Mobile number:</label>
                 <div class="col-sm-3"><input type="text" name="mobno" placeholder=" Mobile number" class="form-control" id="mobno"
                    required onblur="validate('mobilenum','mobnoerror',this.value)">
                 </div>
                  <label id="mobnoerror" class="error"></label>
      </div>
<div class="form-group">
    <label class="control-label col-sm-3" for="Location"> Location: </label>
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
<h3 class="h3style"> Your Current Employment Details </h3>


<div class="form-group">
    <label for="experience" class="control-label col-sm-4"> How much work experience do you have:</label>
        <div class="col-sm-4">
            <select name="experience" class="form-control" id="experience" required>
                <option value="">select </option>
                <option value="0 yr/Fresher"> Fresher </option>
                <option value="1-2 yr">1-2 years </option>
                <option value="3-5 yr">3-5 years </option>
                <option value="5+ yr">5+ years </option>
         </select>
       </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-4" for="skills"> What are your Key Skills:</label>
        <div class="col-sm-4"><input type="text" name="skills" placeholder="Skills" class="form-control" name="skills" id="skills"
        required onblur="validate('text','skillerror',this.value)">
        </div>
        <label id="skillerror" class="error"></label>
</div>


<div class="page-header"></div>
<h3 class="h3style"> Your Educational Qualifications </h3>


<div class="form-group">
    <label class="control-label col-sm-3" for="ugcourse"> Your Basic Education: </label>
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
    <label class="control-label col-sm-3" for="pgcourse"> Your Masters Education:</label>
        <div class="col-sm-4"> <select name="pgcourse" id="pgcourse"  class="form-control" required>
                            <option value="">Select</option>
                            <option value="Not Pursuing Post Graduation"> Not Post Pursuing Graduation</option>
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
                        </select>
          </div>
</div>

<div class="page-header"> </div>

        <div class="form-group form-inline col-sm-10">

        <button class="btn btn-success" type="submit"  id="reg" value="submit">Create Profile</button>
        <label class="col-sm-2"></label>
        <button class="btn btn-danger" type="reset" id="reset"> Reset </button>

</div>

    </form>

        <script type="text/javascript" src="../js/validate.js"></script>
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
                    //document.getElementById("reguser").submit();
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
