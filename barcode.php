<?php
// test lang barcode
require 'vendor/autoload.php';

$id = 36;
$color = [0,0,0] ;
$barcode = "../../../barcodes/".$id.".png";
$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();

file_put_contents($barcode, $generatorPNG->getBarcode('$id', $generatorPNG::TYPE_CODE_128, 3, 50, $color));
echo "<img src=".$barcode.">";