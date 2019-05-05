<?php

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("final_practice");

$username = $_GET['username'];

$sql = "SELECT daysLeftPwdChange FROM fe_login WHERE username = :username";

$arr = array();
$arr[':username'] = $username;

$stmt = $conn->prepare($sql);
$stmt->execute($arr);
$record = $stmt->fetch(PDO::FETCH_ASSOC); 

echo json_encode($record);

?>