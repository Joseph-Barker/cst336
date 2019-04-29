<?php

//receive email and score from the quiz

include 'dbConnection.php';
$conn = getDatabaseConnection("c9");
$np = array();
 

        

$sql = "SELECT * FROM quiz where email = :email";
$np[':email'] = $_GET['email'];


$stmt = $conn->prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content

echo json_encode($records);

//echo $records[0]['productName'];


//1. Get latest score based on email
//2. If record found, first display it in JSON format, then update record
//3. If record not found, insert a new record for that email


?>