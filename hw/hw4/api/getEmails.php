<?php

include '../dbConnection.php';
$conn = getDatabaseConnection("valid_emails");

$sql = "SELECT * FROM emails ORDER BY email_address";
$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content

echo json_encode($records);

//echo $records[0]['productName'];
?>