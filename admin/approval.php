<?php
include "../inc/db.php";
$id = $_GET["id"];
$sql = "Select * FROM inspections Where inspection_id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
if ($_GET["confirm"]==1){


  $sql2 = "UPDATE {$row["table_name"]} SET `status` = 'available' WHERE {$row["primary_key"]} = {$row["id"]}";
  $result2 = mysqli_query($con, $sql2);
  if ($result2){
    echo "Successfull!!<br>";
    $sql3 = "UPDATE `inspections` SET `status` = 'completed' WHERE `inspection_id`='$id'";

  $result3 = mysqli_query($con, $sql3);
    if ($result3){
      echo "Successfull!!<br>";
    }
  }
}
?>
<a href="table.php?name=inspections"><button class="success">আগের পেজে যান</button></a>
