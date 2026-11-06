<?php
	include "header.php";

	$sql = "SELECT ds_name, english_name FROM districts";
	$result = mysqli_query($con, $sql);
?>

	<section class="container">
		
	  	<form id="tour_form" class="col-md-6" action="hotel_and_ticket_booking.php" method="post">
		    <h3 class="plan_form_header">ধাপ ১ঃ ভ্রমণের ব্যাপারে তথ্য দিন</h3>

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

		    <div class="plan_form form-group">
			    <label for="journey_date"><h5>যাত্রা শুরুর তারিখঃ</h5></label>
			    <input type="date" class="form-control" id="journey_date" name="journey_date" placeholder="তারিখ দিন">
		    </div>
		    <div class="plan_form form-group">
		    	<h5>হোটেলে কতদিন থাকতে চান? </h5>
		    	<label for="journey_date"><h6>কত তারিখ থেকেঃ</h6></label>
		    	<input type="date" class="form-control" id="journey_date" name="hotel_start_date" placeholder="তারিখ দিন">
		    	<label for="journey_date"><h6>কত তারিখ পর্যন্তঃ</h6></label>
		    	<input type="date" class="form-control" id="journey_date" name="hotel_end_date" placeholder="তারিখ দিন">
		    </div>

		    <input type="submit" class="btn btn-info" value="পরবর্তী ধাপ" />

	  	</form>
  	</section>

<?php
	include 'footer.php';
?>
