<?php
	include "header.php";
	include "scrapper_map.php";
	include "simplehtmldom/simple_html_dom.php";
	$sql = "SELECT ds_name, english_name FROM districts";
	$result = mysqli_query($con, $sql);
	$journey_date = Date('Y-m-d', strtotime('+2 days'));
	#echo $journey_date;
	$journey_year = substr($journey_date, 0, 4);
	$journey_month = substr($journey_date, 5, 2);
	$journey_day = substr($journey_date, 8, 2);
?>

	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
				<form class="col-md-6" action="transport.php" method="post">
					<div class="plan_form form-group">
					    <label for="address"><h5>আপনার বর্তমান অবস্থান :</h5></label>
					    <select name="source" class="form-select" id="select_box">
		                    <option value="">শহর সিলেক্ট করুন</option>
		                    <?php 
		                    
		                    foreach($result as $row)
		                    {?>
		                     <option value="<?php echo $row["english_name"];?>"><?php echo $row["ds_name"];?></option>
		                    <?php }
		                    ?>  
		                </select>
				    </div>
					<div class="plan_form form-group">
					    <label for="destination"><h5>আপনার গন্তব্য :</h5></label>
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
				  			$link = "https://www.lonexbd.com/search-buses?from=".$ticket_id[$_POST['source']]."&to=".$ticket_id[$_POST['destination']]."&date=".$journey_day."-".$journey_month."-".$journey_year."&return=";
						  $bhtml = file_get_html($link);
						  #echo $link;
						  $table = $bhtml->find('.src-bus-list');
						  $len = count($table);

				  	?>

				  	<table class="table table-responsive">
					    <thead>
					        <tr>
					        	<th></th>
					            <th>Image</th>
					            <th>Description</th>
					            <th>Rating and Price</th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
				        	for ($x = 0; $x < $len; $x++){
							    $tds = $table[$x]->find('td');
							    $operator = $tds[0]->find('strong');
				        	?>
				            <tr class="col-md-12">
				                <td class="col-md-4">
				                    <div class="radiotext">
				                        <label for='regular'><?php echo $tds[0]->outertext . PHP_EOL;?></label>
				                    </div>
				                </td>
				                <td class="col-md-4">
				                    <div class="radiotext">
				                        <label for='regular'><?php echo $tds[2]->outertext . PHP_EOL;?></label>
				                    </div>
				                </td>
				                <td class="col-md-4">
				                    <div class="radiotext">
				                        <label for='regular'><?php 
				                        	$str = $tds[4]->innertext;
				                        	echo $str;
				                        ?></label>
				                    </div>
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