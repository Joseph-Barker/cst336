<?php

//header('Access-Control-Allow-Origin: *');

$host = "localhost";
$dbname = "ottermart";
$username = "root";
$password = "";

//checks whether the URL contains "herokuapp" (using Heroku)
if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$host = $url["host"];
$dbName = substr($url["path"], 1);
$username = $url["user"];
$password = $url["pass"];
}

// Establishing a connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "SELECT * FROM om_product ORDER BY productPrice";
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content

echo json_encode($records);

//echo $records[0]['productName'];
?>