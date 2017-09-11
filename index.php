
<!DOCTYPE HTML>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale =1.0,user-scalable=no">
	  <link href="css/home.css" rel="stylesheet"/>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
	<title> Job Application </title>
	<script type="application/javascript">
		$(document).ready(function(){
			// Add smooth scrolling to all links in navbar + footer link
			$(".navbar a, footer a[href='#insidenav']").on('click', function(event) {

				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
					scrollTop: $(hash).offset().top
				}, 900, function(){

					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
			});
			$(window).scroll(function() {
				$(".slideanim").each(function(){
					var pos = $(this).offset().top;

					var winTop = $(window).scrollTop();
					if (pos < winTop + 600) {
						$(this).addClass("slide");
					}
				});
			});
		})
	</script>
</head>

<nav class="navbar" id="insidenav">
  <div class="container-fluid">
      <div class="navbar-header">
          <a class="navbar-brand" href="#">Job Application</a>
      </div>

     <ul class="nav navbar-nav">
      <li class="active"><a data-toggle="tab" href="#main1">Home</a></li>
        <li><a data-toggle="tab" href="#recent"">Recent Jobs</a></li>
      <li><a data-toggle="tab" href="#jobseeker">Job Seeker</a></li>
      <li><a data-toggle="tab" href="#Employer">Employer</a></li>
      <li><a data-toggle="tab" href="contact">Contact Us</a></li>
    </ul>

	<ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a  href="basic_reg.php">
                        <span class="glyphicon glyphicon-user"></span> Register </span></a>
                   <!-- <ul class="dropdown-menu">
                        <li><a href="jobseeker/register_user.php">Jobseeker</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="employer/register_emp.php">Employer</a></li>
                    </ul>-->
                </li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
    <!--- -------------------------------------------------------------------------------------------------- -->
    <body id="indexbody" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="bmsTop">
	 <ul>
        <li style="font-size: 15px; font-weight: bold">Top Recruiters:</li>
        <li><a href="#" target="_blank">
                <img src="images/3.gif" border="0">
            </a></li>
        <li><a href="#" target="_blank">
                <img src="images/2.gif" border="0">
            </a></li>
        <li><a href="#" target="_blank">
                <img src="images/5.gif" border="0"></a>
        </li>
        <li><a href="#" target="_blank">
                <img src="images/4.gif" border="0"></a></li>
        <li><a href="#" target="_blank">
                <img src="images/1.gif" border="0"></a>
        </li>
    </ul>
</div>

<div class="container-fluid" id="main1"> <!-- jumbotron fluid -->
<div class="jumbotron text-center" id="searchjum">
<h1>Job Application</h1>
    <p>Search for Jobs</p>
    <form class="form-inline" id="homesearch">
        <input type="text" class="form-control" size="60" placeholder="Enter your keyword"  name="keyword" id="keyword">
        <button type="button" onclick="search()" class="btn btn-lg " style="color: black"><span class="glyphicon glyphicon-search"></span> Search</button>
    </form>
</div>
</div> <!-- jumbotron -->
<div class="container" id="subcontent" style="background: transparent">
    <!-- div for search contents -->
</div>
<!-- Our Team -->
<div class="page-header" style="background: #f4511e"></div>
<section>
		<section id="team" style="margin-top: -5%;">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">OUR TEAM</h1>
					<br>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="member">
            <div class="pic"><img src="images/IT005.jpg" alt="Susanta" style="border-radius:50%;"></div>
            <h4>Susanta Chakraborty</h4>
            <div class="social">
              <a href="https://www.facebook.com/SusantatheBOSS"><i class="fa fa-facebook-square" style="color:navy; font-size:22px"></i></a>
							<a href="https://plus.google.com/u/0/+SusantaChakraborty_Boss"><i class="fa fa-google-plus-square" style="color: red; font-size:22px"></i></a>
							<a href="https://twitter.com/susanta_boss"><i class="fa fa-twitter-square" style="color:cyan; font-size:22px"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="member">
            <div class="pic"><img src="images/IT008.jpg" alt="Ayan Das" style="border-radius:50%;"></div>
            <h4>Ayan Das</h4>
            <div class="social">
            <a href="https://www.facebook.com/ayan.loves.alterbridge"><i class="fa fa-facebook-square" style="color:navy; font-size:22px"></i></a>
						<a href="https://plus.google.com/+ClashWithAyan"><i class="fa fa-google-plus-square" style="color: red; font-size:22px"></i></a>
						<a href="https://twitter.com/DasAyantorres"><i class="fa fa-twitter-square" style="color:cyan; font-size:22px"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="member">
            <div class="pic"><img src="images/IT016.jpg" alt="Vishal Bose" style="border-radius:50%;"></div>
            <h4>Vishal Bose</h4>
            <div class="social">
              <a href="https://www.facebook.com/BOSEVISHAL"><i class="fa fa-facebook-square" style="color:navy; font-size:22px"></i></a>
							<a href="https://plus.google.com/u/0/110077539763211585594"><i class="fa fa-google-plus-square" style="color: red; font-size:22px"></i></a>
							<a href="#"><i class="fa fa-twitter-square" style="color:cyan; font-size:22px"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
  <div class="container bg-grey" id="contact">
        <div class="page-header" style="background: #f4511e"></div>
        <h2 class="text-center">CONTACT US</h2>
        <div class="page-header"></div>
        <div class="row">
            <div class="col-sm-5">
                <p><h4>Contact us & we'll get back to you within 48 hours.</h4></p>
                <p><span class="glyphicon glyphicon-map-marker"></span> barasat,West Bengal, India</p>
                <p><span class="glyphicon glyphicon-phone"></span> +91 8240161374</p>
                <p><span class="glyphicon glyphicon-envelope"></span> project.jobapp@gmail.com</p>
            </div>

            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Contact -->
</div> <!-- sub content -->
 <div class="page-header" style="background: #f4511e"></div>
 <!-- Container -->

<!-- Set height and width  -->
<p><div id="googleMap" style="height:400px;width:100%;"></div></p>

<!-- Add Google Maps -->
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzZvGe04AhzBgjDvTjqmrslNMCChtOmWA">
</script>
<script>
    var myCenter = new google.maps.LatLng(22.731943,88.499613);
    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom:12,
            scrollwheel:false,
            draggable:false,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker = new google.maps.Marker({
            position:myCenter,
			map: map
        });
    }
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<footer class="container-fluid text-center">
    <a href="#insidenav" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <p>Job Application</p>
</footer>
</body>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/search.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>
