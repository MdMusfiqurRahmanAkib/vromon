<?php
include "inc/db.php";
require 'vendor/autoload.php';

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$workbook = $reader->load("text/services/transport_1_1648225077.xlsx");

$d = $workbook->getSheet(0)->toArray();

echo count($d) . "<br>";

$workBook = $workbook->getActiveSheet()->toArray();

$file_clmn = 1;
unset($workBook[0]);

foreach ($workBook as $dt) {
	// process element here;

	echo $dt[0] . "==" . $dt[1] . "<br>";
	$file_clmn++;
}
?>