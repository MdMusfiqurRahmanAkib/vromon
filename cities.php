<?php
	include "header.php";
	$obj = new bangla_converter();
?>

	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12">

					<h4>বিভাগসমূহ</h4>
					<hr>
					<div class="vertical-menu city_menu">
					  <a href="#dhaka_districts" class="active">ঢাকা</a>
					  <a href="#chittagong_districts">চট্টগ্রাম</a>
					  <a href="#rajshahi_districts">রাজশাহী</a>
					  <a href="#rangpur_districts">রংপুর</a>
					  <a href="#khulna_districts">খুলনা</a>
					  <a href="#barishal_districts">বরিশাল</a>
					  <a href="#sylhet_districts">সিলেট</a>
					  <a href="#mymensingh_districts">ময়মনসিংহ</a>
					</div>       
				</div>

				<?php 
			    	$division_info =  new database_query("SELECT DISTINCT division FROM districts");
					$divisions = $division_info->query();

					foreach ($divisions as $div) {
	
			    ?>
				<div id="<?php echo $div["division"]."_districts";?>" class="col-md-8 col-xs-12 text-center <?php $class = ($div["division"] === "dhaka") ? "active_districts" : "districts" ; echo $class;?>">

				  	<h2><?php echo $obj->en2bn($div["division"]);?> বিভাগের জেলাসমূহ</h2>

					<div class="row">
						
				  	<?php
				  		$division = $div["division"]; 
				  		
				  		$district_info =  new database_query("SELECT * FROM districts WHERE division='$division'");
						$districts = $district_info->query();

						foreach ($districts as $dist) {
				  	?>			    
						
						<div class="city col-lg-4 col-md-4 col-sm-6 col-xs-12">
						    <div class="hovereffect">
						        <img class="img-thumbnail" src="images/bangladesh_<?php echo rand(1, 15).".jpg";?>" alt="">
						        <div class="overlay">
						           <h2><b><?php echo $dist["ds_name"];?></b></h2>
						           <a class="info" href="city.php?city=<?php echo $dist["ds_name"];?>">বিস্তারিত</a>
						        </div>
						    </div>
						</div>
						<!--
					    <div class="city col-lg-4 col-md-4 col-sm-6 col-xs-12">
						    <div class="hovereffect">
						        <img class="img-thumbnail" src="https://picsum.photos/600/450/?image=<?php echo rand(1, 999);?>" alt="">
						        <div class="overlay">
						        	<h2><?php echo $dist["ds_name"];?></h2>
						            <a class="info" href="city.php">বিস্তারিত</a>
						        </div>
						    </div>
						</div>
						-->
					<?php } ?>
					</div>

				</div>

				<?php } ?>

			</div>

	</section>
	
<?php
	include "footer.php";
?>