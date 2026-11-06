<?php
include "../inc/db.php";
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$verdict = $_GET["verdict"];
$id = $_GET["id"];

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();

  $sheet->setTitle("Post Decision");
  $sheet->setCellValue("A1", "Post id");
  $sheet->setCellValue("B1", $id);

  $sheet->setCellValue("A2", "Decision");
  $sheet->setCellValue("B2", $verdict);

  $sheet->setCellValue("A3", "feedback");
  $sheet->setCellValue("B3", $_POST["comment"]);

  $sheet->setCellValue("A4", "time");
  $sheet->setCellValue("B4", time());

  $title = "post_".$id."_".time();
  $writer = new Xlsx($spreadsheet);
  $file = "text/notifications/".$title.".xlsx";
  $writer->save("../".$file);

  $pk = "notification_id";
  $sql8 = "SELECT MAX($pk) FROM `notification`";
  $result8 = mysqli_query($con, $sql8);
  if(mysqli_num_rows($result8)<1)
    $pk_val = 1;
  else{
    $row8 = mysqli_fetch_assoc($result8);
    $key = "MAX(".$pk.")";
    $pk_val = $row8[$key]+1;
  }

  $sql2 = "SELECT user_id from blog_post where bp_id='$id'";
  $result2 = mysqli_query($con, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $user_id = $row2["user_id"];
  echo

  $sql1 = "INSERT INTO `notification` (`notification_id`, `user_id`, `notification_type`, `notification_file`, `status`, `notification_time`) VALUES ('$pk_val', '$user_id', 'post_decision', '$file', 'unseen', CURRENT_TIMESTAMP)"; //Insert Query

  $result1 = mysqli_query($con, $sql1);


$sql2 = "UPDATE `blog_post` SET `approval` = '$verdict' WHERE `blog_post`.`bp_id` = $id";
$result2 = mysqli_query($con, $sql2);

if($result2){
  header('Location: table.php?name=blog_post');
}

?>
