<?php 
	include "link.php";
	include "inc/db.php";
	include "simplehtmldom/simple_html_dom.php";
	$hlink = $_GET['link'];
  $html = file_get_html("https://www.booking.com".$hlink);
?>
<section id="hotel_details">
	<div class="container text-center">
	  	
	    <hr>
	  	<hr>
	  	<h2><?php 
	  		$title =  $html->find(".pp-header__title");
	  		foreach($title as $t){
		       echo $t->outertext;
			}
	  	?></h2>
	  	<hr/>
		<hr/>
		<div class="hotel_images">
			<div class="row">
				<div class="main_image col-md-6">
					<div id="large_image">
						<?php 
							$image_class =  $html->find('.bh-photo-grid-photo1');
  							
						  	foreach($image_class as $ic){
						       foreach($ic->find('img') as $im){
						             $src = $im->src."<br>";
						       }
							}
						?>
						<img class="img-fluid" src="<?php echo $src;?>" alt="Responsive image">
						<br>
						<br>
						
					</div>
					<?php 

						$image_class =  $html->find('.bh-photo-grid-side-photo');
  						$src = array();
					  	foreach($image_class as $ic){
					       foreach($ic->find('img') as $im){
					            array_push($src, $im->src);
					       }
					   }

						$image_class =  $html->find('.bh-photo-grid-thumb');
  							$l = 2;
  							for ($i=0;$i<$l;$i++) {
						       foreach($image_class[$i]->find('img') as $im){
						            array_push($src, $im->src);
						       }
						   }
						  
					?>

					<div id="sm_image_1" class="sm_image">
						<img class="img-fluid" src="<?php echo $src[0];?>" alt="Responsive image">
						<br>
						<br>
					</div>

					<div id="sm_image_2" class="sm_image">
						<img class="img-fluid" src="<?php echo $src[1];?>" alt="Responsive image">
						<br>
						<br>
							
					</div>

					<div id="sm_image_3" class="sm_image">
						<img class="img-fluid" src="<?php echo $src[2];?>" alt="Responsive image">
						<br>
						<br>
					</div>

					<div id="sm_image_4" class="sm_image">
						<img class="img-fluid" src="<?php echo $src[3];?>" alt="Responsive image">
						<br>
						<br>
					</div>
				</div>
				
				<div class="small_images col-md-6">

					<div class="row">
						<div class="small_image">
							<a href="#sm_image_1"><img class="img-thumbnail" src="<?php echo $src[0];?>" alt="Responsive image"></a>
							<br>
							<br>
						</div>
						<div class="small_image">
							<a href="#sm_image_2"><img class="img-thumbnail" src="<?php echo $src[1];?>" alt="Responsive image"></a>
							<br>
							<br>
						</div>
					</div>

					<div class="row">

						<div class="small_image">
							<a href="#sm_image_3"><img class="img-thumbnail" src="<?php echo $src[2];?>" alt="Responsive image"></a>
							<br>
							<br>
						</div>

						<div class="small_image">
							<a href="#sm_image_4"><img class="img-thumbnail" src="<?php echo $src[3];?>" alt="Responsive image"></a>
							<br>
							<br>
						</div>
					
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

<section id="hotel_info_rating">
	<div class="container">
	  	<hr>
	  	<hr>
	  	<h2 class="text-center">প্রয়োজনীয় তথ্য </h2>
	  	<hr/>
		<hr/>

		<div class="row">

		    <div class="city_info col-md-6">
				<?php 
					$desc =  $html->find('#property_description_content');
					 foreach ( $desc as $item ) {
					    echo $item->outertext."<br>";
					  }
					  
					 $fasc =  $html->find('.hp_desc_important_facilities');
					 echo $fasc[0]->outertext."<br>";
					 
					 $rest =  $html->find('.k2-hp--restaurants');
					 foreach ( $rest as $item ) {
					    echo $item->outertext."<br>";
					  }

				?>
		    </div>
			<div class="col-md-2"></div>
			<div class="city_rating col-md-4">
				<a href="https://www.booking.com<?php echo $hlink;?>"><button class="btn-info">View Details Here</button></a>
		    </div>
			
		</div>
	</div>
</section>

<?php 
	include "footer.php";
?>