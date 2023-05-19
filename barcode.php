<?php
require 'vendor/autoload.php';
$id = 36;
$color = [0,0,0] ;
$barcode = "../../../barcodes/".$id.".png";
// This will output the barcode as HTML output to display in the browser
$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG(); // Pixel based PNG
file_put_contents($barcode, $generatorPNG->getBarcode('$id', $generatorPNG::TYPE_CODE_128, 3, 50, $color));
echo "<img src=".$barcode.">";