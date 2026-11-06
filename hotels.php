<?php
	include "header.php";
	include "scrapper_map.php";
	include "simplehtmldom/simple_html_dom.php";
	$sql = "SELECT ds_name, english_name FROM districts";
	$result = mysqli_query($con, $sql);
?>

	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
				<form class="col-md-6" action="hotels.php" method="post">
					<div class="plan_form form-group">
					    <label for="destination"><h5>কোথায় যেতে চান :</h5></label>
					    <select name="destination" class="form-select" id="select_box">
		                    <option value="">শহর সিলেক্ট করুন</option>
		                    <?php 
		                    
		                    foreach($result as $row)
		                    {?>
		                     <option value="<?php echo $row["english_name"];?>"><?php echo $row["ds_name"];?></option>
		                    <?php }
		                    ?>  
		                </select>
				    </div>
				    <input type="submit" class="btn btn-info" value="খোঁজ করুন" />
				</form>
				      
				</div>
				
				<div class="col-md-8 text-center">
				  	<?php 
				  		if (isset($_POST["destination"])){
				  			$link = "https://www.booking.com/searchresults.html?ss=Sylhet&ssne=Sylhet&ssne_untouched=Sylhet&label=gog235jc-1DCAEoggI46AdIM1gDaBSIAQGYATG4ARnIAQzYAQPoAQH4AQKIAgGoAgO4Ao_b8ZYGwAIB0gIkYWVkNzJjNWQtMGEyMC00ZTJmLWI0ZDEtZjhjZmVjOGQzMzQ22AIE4AIB&sid=026fcb0aea5e1745412103fd0e3d67d2&aid=397594&lang=en-us&sb=1&src_elem=sb&src=searchresults&dest_id=".$booking_id[$_POST['destination']]."&dest_type=city&checkin=".Date('y-m-d', strtotime('+3 days'))."&checkout=".Date('y-m-d', strtotime('+5 days'))."&group_adults=2&no_rooms=1&group_children=0&sb_travel_purpose=leisure";

				  			$hotel_html = file_get_html($link);
							$list = $hotel_html->find('.js-sr-card');
							$photos = $hotel_html->find('.sr__card_photo');
							$desc = $hotel_html->find('.sr__card_main');
							$review = $hotel_html->find('.sr__card_review');
							$hotel_links = array();
							$len = count($desc);

							foreach($desc as $d){
								foreach($d->find('a') as $hotel_link){
									array_push($hotel_links,$hotel_link->href);;
								}
							}

				  	?>

				  	<table class="table table-responsive">
					    <thead>
					        <tr>
					            <th>Image</th>
					            <th>Description</th>
					            <th>Rating and Price</th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    		for ($x = 0; $x < $len; $x++){
					    	?>
					    	<tr class="col-md-8">
					    		<td class="col-md-4">
				                    <div class="radiotext">
				                        <label for='regular'><?php echo $photos[$x]->outertext . PHP_EOL;?></label>
				                    </div>
				                </td>
				                <td class="col-md-4">
				                    <div class="radiotext">
				                        <label for='regular'><?php echo $desc[$x]->outertext . PHP_EOL;?></label>
				                    </div>
				                </td>
				                <td class="col-md-4">
				                    <div class="radiotext">
				                        <label for='regular'><?php 
				                        	$str = $review[$x]->innertext;
				                        	echo $str;
				                        ?></label>
				                    </div> 
				                </td>
				                <td>
				                	<a href="hotel_details.php?link=<?php echo $hotel_links[$x];?>" target="_blank"><button type="button" class="btn-info">View Details</button></a>
				                </td>
					    	</tr>

					    <?php } ?>
					    </tbody>
					</table>
				  <?php } ?>
				</div>
				
			</div>

	</section>

<?php
	include "footer.php";
?>