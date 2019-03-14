<?php

require_once __DIR__ . '/vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf([
//     'mode' => 'utf-8',
//     'format' => 'A4-L',
//     'orientation' => 'L'
// ]);
$mpdf = new \Mpdf\Mpdf();
ob_start();
include "test1.php"; 
$template = ob_get_contents();
ob_end_clean();
$pdfFilePath ="pdf/vendor_with_no_category.pdf";
$mpdf->keep_table_proportions = false;
$mpdf->WriteHTML($template);
$mpdf->debug = true;
$mpdf->Output($pdfFilePath,"F");

echo 'PDF is successfully generated';