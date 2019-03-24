<?php

$product = array();
$productArray = array();

$product["product"] = "Microfiber Beach Towel";
$product["price"] = "40";
$product["qty"] = "2";

array_push($productArray, $product);

$product["product"] = "Flip-flop Sandals";
$product["price"] = "30";
$product["qty"] = "5"; 

array_push($productArray, $product);

$product["product"] = "Sunscreen 80SPF";
$product["price"] = "20";
$product["qty"] = "3"; 

array_push($productArray, $product);

$product["product"] = "Flying Disc";
$product["price"] = "15";
$product["qty"] = "4"; 

array_push($productArray, $product);

$product["product"] = "Beach Umbrella";
$product["price"] = "75";
$product["qty"] = "1"; 

array_push($productArray, $product);

echo json_encode($productArray[rand(0,4)]);

?>