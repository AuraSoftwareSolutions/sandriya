<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	  .logo{
		width: 192px;
		height: 67px;
		position: relative;
		bottom: 20px;
		border-radius: 7px;
	  }
	</style>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a  class="navbar-brand scrollTo" <a onclick="window.open('index.php','_self')"><img class="logo" src="logo.jpg"/></a>


				</div>
				<div class="navbar-collapse collapse" id="navigation">
					<ul class="nav navbar-nav navbar-right">
						<li ><a onclick="window.open('index.php','_self')" style="cursor:pointer">Home</a>
						</li>

						<li id="jeep"><a class="j1"  onclick="window.open('jeepsafari.php','_self')" style="cursor:pointer">Jeep Safari</a>
						</li>
						<li id="packages"><a class="pk" onclick="window.open('Packages.php','_self')" style="cursor:pointer">Packages</a>
						</li>

						<li id="events"><a class="ev" onclick="window.open('Events.php','_self')" style="cursor:pointer">Events</a>
						</li>
						<li ><a onclick="window.open('index.php#services','_self')" style="cursor:pointer">Services</a>
						</li>

						<li><a onclick="window.open('index.php#testimonials','_self')">Testimonials</a>
						</li>

						<!-- <li><a onclick="window.open('index.php#references','_self')" style="cursor:pointer">Destinations</a>
						</li> -->



						<li id="ab"><a id="abt" onclick="window.open('index.php#about_us','_self')" style="cursor:pointer">About Us</a>
						</li>

	
						<li id="cn"><a id="cnt" onclick="window.open('index.php#contact1','_self')" style="cursor:pointer">Contact</a>
						</li>
					</ul>

				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
</body>
</html>