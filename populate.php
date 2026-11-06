<?php
// (A) LOAD PHPSPREADSHEET
require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// (B) CREATE A NEW SPREADSHEET
$spreadsheet = new Spreadsheet();

// (C) GET WORKSHEET
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle("Basic");
$sheet->setCellValue("A1", "Hello World !");
$sheet->setCellValue("A2", "Goodbye World !");


// (E) OUTPUT
$writer = new Xlsx($spreadsheet);

// (E1) SAVE TO A FILE ON THE SERVER
$writer->save("demoA.xlsx");
echo "OK!";
?>