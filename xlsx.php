<?php 
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


$workbook = $reader->load("text/inspections/hotels_5.xlsx");

$d=$workbook->getSheet(0)->toArray();

echo count($d)."<br>";

$workBook = $workbook->getActiveSheet()->toArray();

$file_clmn=1;
unset($workBook[0]);

foreach ($workBook as $dt) {
 // process element here;

	echo $file_clmn."---".$dt[0].",".$dt[1]." <br>";
	$file_clmn++;
}
?>