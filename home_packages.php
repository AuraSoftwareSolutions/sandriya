
	<!-- *** TRIP PLAN ***
	_________________________________________________________ -->
	<?php
	   			   require_once("connection.php");
					  
	?>
<div class="section">
	     <div class="container">
			 <div class="row">
				<div class="mb20">
					<h2 class="title" data-animate="fadeInUp">Jeep Safari</h2>
				</div>
				<div id="references-masonry2 col-md-4" style="position:relative;left:54px;" data-animate="fadeInUp">
				<?php
					require_once('manage.php');
					 $data = showJeepSafariDataLimit();
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
<div class="section" id="packages">
	<div class="container">
		<div class="col-sm-12">

			<div class="mb20">
				<h2 class="title" data-animate="fadeInUp">EXPLORE OUR TOP PACKAGES</h2>
			</div>
 			<div id="detail">

				<span class="close">&times;</span> 

				<div id="detail-slider"></div>

				<div class="text-center">
					<h1 id="detail-title">&nbsp;</h1>
				</div>

				<div id="detail-content"></div>
				<div class="buttons btn btn-primary tour-cart-button">
					<i class="fa fa-plus-circle"></i> More Deatils
				</div>
				<div class="buttons btn btn-primary tour-cart-button">
					<i class="fa fa-plus-circle"></i> Book now.
				</div>

			</div>
			<div id="references-masonry" data-animate="fadeInUp">
				<?php
			require_once('manage.php');
					 $data = showPackagesDataLimit();
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
		<!-- /#references-masonry -->

	</div>
	<!-- /.12 -->
</div>
<!-- /.container -->
</div>