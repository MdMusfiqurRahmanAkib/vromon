<?php
include "../inc/db.php";
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$id = $_GET["id"];
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
if (is_null($reader)){
  echo "NULL<br>";
}

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();

  $line = 1;

  foreach ($_POST as $key => $value) {
    $field = htmlspecialchars($key);
    if ($field=="title"){
      $title = htmlspecialchars($value);
      $sheet->setTitle($title);
    }else if ($field=="category"){
      $category = htmlspecialchars($value);
    }else{
      $sheet->setCellValue("A".$line, htmlspecialchars($value));
      $line+=1;
    }
    #echo htmlspecialchars($value)."<br>";
  }

  $writer = new Xlsx($spreadsheet);
  $file = "../text/rules/".$title.".xlsx";
  $writer->save($file);

  if ($id==0){
    $pk = $pks["rules"];
    $sql8 = "SELECT MAX($pk) FROM `rules`";
    $result8 = mysqli_query($con, $sql8);
    if(mysqli_num_rows($result8)<1)
      $pk_val = 1;
    else{
      $row8 = mysqli_fetch_assoc($result8);
      $key = "MAX(".$pk.")";
      $pk_val = $row8[$key]+1;
    }

    $sql = "INSERT INTO `rules` (`rule_id`, `category`, `rule_title`, `rule_file`) VALUES ('$pk_val', '$category', '$title', '$file')";
    $result = mysqli_query($con, $sql);

    if($result){
      echo "Rule Added<br>";
      ?>
    <?php }
  }else{

}?>
<a href="table.php?name=rules"><button class="success">সব রুল দেখুন</button></a>
