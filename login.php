<!Doctype html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	    <link href="css/signin.css" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
      <script>
      $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
    </script>
        <title> Sign In</title>
    </head>
    <nav class="navbar" id="insidenav">
        <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../Job_Application/index.php">Job Application</a>
			</div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="#">Login</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="../Job_Application/basic_reg.php">
            <span class="glyphicon glyphicon-user"></span> Sign Up </a>
			 </li>
			 </ul>
        </div>
    </nav>
    <body>
         <div class="container col-sm-5 pull-right">
        <form class="form-signin" action="process_login.php" method="post" >
            <h2 class="form-signin-heading">Please sign in</h2>
             <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
             <label for="inputPassword" class="sr-only">Password</label>
                 <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
             <!-- <div class="checkbox">
                 <label><input type="checkbox" value="remember-me"> Remember me </label>
                         <a href="forget.php">/Forgot Password</a>
             </div> -->
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
    <div class="col-sm-10">
        <br> <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="container col-sm-10 pull-right" >

        <div class="row">
            <div class="askreg">
                <div class="col-lg-3">
                    <br>
                </div>
                <div class="col-lg-4 ">
                    <h2>Find Jobs</h2><br>
                    <p> Helps passive and active jobseekers find better jobs.
                        Get connected with over 4500 recruiters.
                        Apply to jobs in just one click.
                        Apply to thousands of jobs posted daily.
                    </p>
                    <p><a class="btn btn-default" href="basic_reg.php">Register Today<span class="glyphicon glyphicon-arrow-right"></span> </a></p>
                </div>
            </div>
            <div class="askreg">
            <div class="col-lg-4 ">
                <h2>Looking for the right candidate?</h2>
                <p> Post a job in easy steps and start receiving applications the same day.
                    Find the right candidates easily and quickly through our Search feature.
                </p>
                <p><a class="btn btn-default" href="basic_reg.php">Register Your Company <span class="glyphicon glyphicon-arrow-right"></span> </a></p>
            </div>
            </div>
        </div>
    </div>
    </body>
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>
