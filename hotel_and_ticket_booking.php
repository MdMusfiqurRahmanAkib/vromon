<?php
	include "header.php";
	include "simplehtmldom/simple_html_dom.php";
	include "scrapper_map.php";
?>
<?php 
#echo $_POST['source']."<br>";
#echo $_POST['destination']."<br>";
#echo $_POST['journey_date']."<br>";

$journey_year = substr($_POST['journey_date'], 0, 4);
$journey_month = substr($_POST['journey_date'], 5, 2);
$journey_day = substr($_POST['journey_date'], 8, 2);

#echo $_POST['hotel_start_date']."<br>";
/*
$check_in_year = substr($_POST['hotel_start_date'], 0, 4);
$check_in_month = substr($_POST['hotel_start_date'], 5, 2);
$check_in_day = substr($_POST['hotel_start_date'], 5, 2);
*/
#echo $_POST['hotel_end_date']."<br>";
/*
$check_out_year = substr($_POST['hotel_end_date'], 0, 4);
$check_out_month = substr($_POST['hotel_end_date'], 5, 2);
$check_out_day = substr($_POST['hotel_end_date'], 5, 2);
*/
$link = "https://www.booking.com/searchresults.html?ss=Sylhet&ssne=Sylhet&ssne_untouched=Sylhet&label=gog235jc-1DCAEoggI46AdIM1gDaBSIAQGYATG4ARnIAQzYAQPoAQH4AQKIAgGoAgO4Ao_b8ZYGwAIB0gIkYWVkNzJjNWQtMGEyMC00ZTJmLWI0ZDEtZjhjZmVjOGQzMzQ22AIE4AIB&sid=026fcb0aea5e1745412103fd0e3d67d2&aid=397594&lang=en-us&sb=1&src_elem=sb&src=searchresults&dest_id=".$booking_id[$_POST['destination']]."&dest_type=city&checkin=".$_POST['hotel_start_date']."&checkout=".$_POST['hotel_end_date']."&group_adults=2&no_rooms=1&group_children=0&sb_travel_purpose=leisure";
echo $link;
$hotel_html = file_get_html($link);
$list = $hotel_html->find('.js-sr-card');
$photos = $hotel_html->find('.sr__card_photo');
$desc = $hotel_html->find('.sr__card_main');
$hotel_links = array();

 foreach ($list as $value) {
    echo $value->outertext . PHP_EOL;;
  }
  
foreach($desc as $d){
	foreach($d->find('a') as $hotel_link){
		array_push($hotel_links,$hotel_link->href);;
	}
}
#print_r($hotel_links);
$review = $hotel_html->find('.sr__card_review');
$len = count($desc);
?>
<form action="tour_booking_process.php?source=<?php echo $_POST['source'];?>&dest=<?php echo $_POST['destination'];?>&journey_date=<?php echo $_POST['journey_date'];?>&start_date=<?php echo $_POST['hotel_start_date'];?>&end_date=<?php echo $_POST['hotel_end_date'];?>" method="post">
<h5>হোটেল সিলেক্ট করুন</h5>

  	<table class="table table-responsive">
	    <thead>
	        <tr>
	            <th>Select</th>
	            <th>Image</th>
	            <th>Description</th>
	            <th>Rating and Price</th>
	        </tr>
	    </thead>
	    
	    <tbody>
	        
	        	<?php 
	        	for ($x = 0; $x < $len; $x++){
				    
	        	?>
	            <tr class="col-md-12">
	                <td>
	                    <div class="radio">
	                        <label><input type="radio" id='regular' name="hotel" value="<?php echo $hotel_links[$x];?>"></label>
	                    </div>
	                </td>
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
  <?php 
  $link = "https://www.lonexbd.com/search-buses?from=".$ticket_id[$_POST['source']]."&to=".$ticket_id[$_POST['destination']]."&date=".$journey_day."-".$journey_month."-".$journey_year."&return=";
  $bhtml = file_get_html($link);
  #echo $link;
  $table = $bhtml->find('.src-bus-list');
  $len = count($table);
  ?>
  <h5>পরিবহন সিলেক্ট করুন</h5>
  <table class="table table-responsive">
	    <thead>
	        <tr>
	        	<th></th>
	            <th>Select</th>
	            <th>Operator</th>
	            <th></th>
	            <th>Time</th>
	            <th>Ticket Price</th>
	        </tr>
	    </thead>
	    
	    <tbody>
	        	<?php 
	        	for ($x = 0; $x < $len; $x++){
				    $tds = $table[$x]->find('td');
				    $operator = $tds[0]->find('strong');
	        	?>
	            <tr class="col-md-12">
	                <td>
	                    <div class="radio">
	                        <label><input type="radio" id='regular' name="transport" value="<?php echo $tds[0]->plaintext;?>"></label>
	                    </div>
	                </td>
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
	<input type="submit" class="btn btn-success" value="বুকিং এবং পেমেন্ট করুন">
	</form>
  <?php 
/*
  foreach ( $table as $item ) {
      echo $item->outertext . PHP_EOL;
  }*/
?>

<?php
	include "footer.php";
?>
