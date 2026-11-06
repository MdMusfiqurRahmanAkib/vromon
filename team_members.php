<?php
include "header.php";
?>

<section id="team_members">
	<div class="container text-center">

	  	<h3><b>আমাদের টীম</b></h3>
	  	<hr/>
		<hr/>
		<div id="team_info" class="row  mt-30">

		    <?php

$team_info = new database_query("SELECT * FROM team");
$result = $team_info->query();

foreach ($result as $emp) {

	?>

			<div class="mar-img col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              	<div class="img-box">
                	<img src="<?php echo $emp["emp_image"]; ?>" class="img-responsive">
                	<ul class="text-center">
                  		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  		<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  		<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  		<li><a href="#"><i class="fa fa-rss"></i></a></li>
                	</ul>
              	</div>
              	<br>
              	<h1><?php echo $emp["emp_name"]; ?></h1>
              	<h2><?php echo $emp["emp_post"]; ?></h2>

             	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $emp["emp_id"] . "_info"; ?>">
			  		বিস্তারিত
				</button>
            </div>

            <!-- Modal -->
			<div class="modal fade" id="<?php echo $emp["emp_id"] . "_info"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">

			      	<div class="modal-body">
					  <div class="container-fluid">

					    <div class="row">

					      	<div class="col-md-6">
					      		<img class="img-fluid" src="<?php echo $emp["emp_image"]; ?>" alt="Chania">
					      	</div>

					      	<div class="col-md-6 ml-auto">
								<h5><?php echo $emp["emp_name"]; ?></h5>
              					<h5><?php echo $emp["emp_post"]; ?></h5>
					     	</div>

					    </div>

						<hr>
						<hr>

					    <div class="row">

					      	<div class="col-md-12">
						      	<?php

	if ($fh = fopen("text/info.docx", 'r')) {
		while (!feof($fh)) {
			$line = fgets($fh);
			echo $line . "<br><br>";
		}
		fclose($fh);
	}

	?>
								<h3>Follow Him on: </h3>
								<ul class="social-network social-circle">
			                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
			                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
			                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
			                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
			                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
			                    </ul>

					      	</div>
					    </div>
					  </div>
					</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      	</div>
			    </div>
			  </div>
			</div>
			<?php }?>

		</div>
	</div>
</section>



<?php
include "footer.php";
?>