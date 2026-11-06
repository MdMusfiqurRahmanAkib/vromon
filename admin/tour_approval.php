<?php
include "../inc/db.php";

$verdict = $_GET["verdict"];
$id = $_GET["id"];

$sql = "UPDATE `tours` SET `status` = '$verdict' WHERE `tours`.`tour_id` = $id";
$result = mysqli_query($con, $sql);

if($result){?>
  <a href="table.php?name=tours"><button type="submit" class="login_register_btn btn btn-primary"></i>ট্যুর দেখুন</button></a>
<?php }
?>
