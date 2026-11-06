<?php
$con = mysqli_connect("localhost", "root", "", "tms");


mysqli_set_charset($con, "utf8");

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$pks =  array("blog_post" => "bp_id", "comment_replies" => "reply_id", "districts" => "ds_id", "guides" => "user_id", "homemade_foods" => "sp_id", "hotels" => "hotel_id", "messages" => "message_id", "places" => "place_id", "post_comments" => "comment_id", "subscribers" => "subscriber_id", "team" => "emp_id", "tours" => "tour_id", "transports" => "transport_id", "users" => "user_id", "travel_stories" => "story_id", "postal_codes" => "postal_code", "inspectors" => "user_id", "moderators" => "user_id","inspections" => "inspection_id", "food_menu" => "food_id", "tour_services" => "ts_id", "rules"=>"rule_id");
?>
