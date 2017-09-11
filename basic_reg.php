
<!DOCTYPE HTML>
    <html>
    <head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../Job_Application/bootstrap/dist/css/bootstrap.min.css"/>
        <link href="../Job_Application/css/main.css" rel="stylesheet"/>
        <link href="../Job_Application/css/jobseeker.css" rel="stylesheet"/>
        <title>User Registration</title>
        <script type="text/javascript" src="../Job_Application/js/validate.js"></script>
        <script src="../Job_Application/js/jquery-1.12.0.min.js"></script>
        <script src="../Job_Application/js/bootstrap.min.js"></script>

</head>
    <body>

        <nav class="navbar" id="insidenav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../Job_Application/index.php">Job Application</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">User Registration</a></li>

               </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../Job_Application/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
               </ul>
             </div>
         </nav>

    <div class="container">
        <div class="jumbotron">
            <h1>Register With Us Now!!</h1>
            <p>
                Register Today and get your amazing companies offers.<br/>
                Apply to jobs in just one click. Apply to thousands of jobs posted daily.<br/>
                Employers get appropiate candidate For their work.
            </p>
        </div>

    <FORM id="reguser" onsubmit="return checkForm()" METHOD="post"  ACTION="process_basic.php"enctype="multipart/form-data" class="form-horizontal">
    <h3 class="h3style"> Your Login Detials </h3>

    <div class="form-group">
        <label class="control-label col-sm-2" for="name_user" >Enter your Username:</label>
        <div class="col-sm-4">
             <input type="text" name="name_user" placeholder="Name/Username" class="form-control" id="name_user"
                        required onblur="validate('username','nameerror',this.value)">
        </div>
        <label id="nameerror" class="error" ></label>
    </div>
    <div class="form-group">
    <label for="sex" class="control-label col-sm-2"> Sex:</label>
        <div class="col-sm-4">
            <select name="sex" class="form-control" id="sex" required>
                <option value="m" selected>Male </option>
                <option value="f">Female</option>
                <option value="o">Other </option>
            </select>
        </div>
    </div>
    <div class="form-group">
    <label for="acc_type" class="control-label col-sm-2"> Type Of Account:</label>
        <div class="col-sm-4">
            <select name="acc_type" class="form-control" id="acc_type" required>
                <option value="" > Choose from Drop Down </option>
                <option value="j">Job Seeker </option>
                <option value="e">Employer</option>
            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-sm-2" for="email" >Enter your Email ID:</label>
        <div class="col-sm-4">
             <input type="email" name="useremail" placeholder="Your E-mail" class="form-control" id="email"
                        required onblur="validate('email','emailerror',this.value)">
        </div>
        <label id="emailerror" class="error" ></label>
     </div>

     <div class="form-group">
         <label class="control-label col-sm-2 " for="passnew" > Create new Password:</label>
         <div class="col-sm-4">  <input type="password" id="passnew" placeholder="New Password" name="pass1" class="form-control"
                      required onblur="validate('password','passerror',this.value)">
         </div>
        <label id="passerror" class="error"></label>
    </div>

    <div class="form-group">
            <label class="control-label col-sm-2 for="passconf">Confirm the Password:</label>
               <div class="col-sm-4">
                <input type="password" id="passconf" placeholder="Confirm Password" name="pass2" class="form-control" required>
                   </div>
                   <label class="error" id="passerror2"></label>
            </div>

<div class="page-header"> </div>

        <div class="form-group form-inline col-sm-10">

        <button class="btn btn-success" type="submit"  id="reg" value="submit">Register</button>
        <label class="col-sm-2"></label>
        <button class="btn btn-danger" type="reset" id="reset"> Reset </button>

		</div>
	</div>

</form>
</body>
	 <script type="text/javascript">
             function checkForm() {

				// Fetching values from all input fields and storing them in variables.
				var name = document.getElementById("nameerror").innerHTML;
				var email = document.getElementById("emailerror").innerHTML;
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

				if( name == "" &&email == '' && pass1 == '' && pass2 == '' ) {
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
