<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<?php
	   			   require_once("connection.php");
					  
	?>
<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="robots" content="all,follow">
	<meta name="googlebot" content="index,follow,snippet,archive">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Sandriya,Tours,advice,kerala,india,gods own country">

	<!-- Plage Title -->
	<title>Sandriya Tours and Advice</title>

	<!-- Loading Spinner style -->
	<style type="text/css">
	.no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(img/ajax-loader.gif) center no-repeat #fff;
	}


	</style>

	<!-- Style for carosel buttons -->
	<style type="text/css">
	.slide-control{color:#fff;font-size:80px;left:30px;margin-top:-70px;position:absolute;top:50%;}
	.slide-control.right{left:auto;right:30px;}
	</style>

	<!-- Stylesheet Links -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,100%7CRoboto:400,700,300,100' rel='stylesheet' type='text/css'>
	<!-- Add to cart styles -->
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->

	<!-- Bootstrap and Font Awesome css -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Theme stylesheet -->
	<link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

	<!-- Custom stylesheet - for your changes -->
	<link href="css/custom.css" rel="stylesheet">

	<!-- owl carousel css -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">

	<!-- CSS Animations -->
	<link href="css/animate.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.png">
	
	<!-- Scripts  -->

	<!-- Mordernizr -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- Responsivity for older IE -->
	<!-- [if lt IE 9]
	   <script src="js/respond.min.js"></script>
	   [endif] -->

	   <!-- ajax for spinner -->
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

	   <script type="text/javascript">
	   $(window).load(function() {
		  // Animate loader off screen
		  $(".se-pre-con").fadeOut("slow");;
		});
	   </script>

	</head>

	<div class="se-pre-con"></div>

	<body data-spy="scroll" data-target="#navigation" data-offset="120">
        <!-- *** NAVBAR *** 
            _________________________________________________________ -->
       <?php

       include('new_navbar.php');

       ?>
		<!-- /#navbar -->
		

		<div id="all" style="margin-top:35px; ">
<!-- *** Events Intro IMAGE ***
    _________________________________________________________ -->
		
<div style=" width:100%; height:auto; ">
	<p>
  <a href="#Event" target="_blank">
    <img src="Events_images/intro1.jpg" style='width:100%;' border="0" alt="Null">
  </a>
</p>
</div>
<div class="section">
	     <div class="container">
			 <div class="row">
				<div class="mb20">
					<h2 class="title" data-animate="fadeInUp">Events</h2>
				</div>
				<div id="references-masonry2 col-md-4" style="position:relative;left:54px;" data-animate="fadeInUp">
				<?php
			      require_once('manage.php');
					 $data = showEventAll();
					 $data_decode = json_decode($data);
					 
					 /* If data is not found display the error message */
					 if($data_decode == null){
					 
					   echo "<p style='color:red;text-align:center'>No record Found</p>";
					 }else{

							foreach($data_decode as $result){
					 ?>
					 <div class="reference-item col-md-6" data-category="Idukki" style="height:225px;">
						<div class="reference">
					 <a href="#">
						<img src="<?php echo $result->image; ?>" class="img-responsive" alt="" />
								<div class="overlay">
									<h3 class="reference-title"><?php echo $result->name; ?></h3>
								</div>
							</a>
							<div class="sr-only reference-description" data-images="<?php echo $result->image; ?>">
								<p><?php echo $result->description; ?></p>
							</div>
						</div>
					</div>   

					<?php
				}

			}
				
				?>
			</div>
				
				</div>
</div>

	</div>

	<?php include('home_footer.html');?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
	</script>
	<script src="js/cartmain.js"></script>
	
	<!-- /#all -->

	<!-- #### JAVASCRIPT FILES ### -->

	<!-- js base -->
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- for demo purpose -->
	<script src="js/jquery.cookie.js"></script>

	<!-- waypoints for scroll spy -->
	<script src="js/waypoints.min.js"></script>

	<!-- masonry layout -->
	<script src="js/masonry.pkgd.min.js"></script>

	<!-- owl carousel -->
	<script src="js/owl.carousel.min.js"></script>


	<!-- jQuery scroll to -->
	<script src="js/jquery.scrollTo.min.js"></script>

	<!-- jQuery counter -->
	<script src="js/jquery.counterup.min.js"></script>

	<!-- jQuery parallax -->
	<script src="js/jquery.parallax-1.1.3.js"></script>

	<!-- main js file -->

	<script src="js/front.js"></script>

	<script src="js/custom.js"></script>

</body>

</html>