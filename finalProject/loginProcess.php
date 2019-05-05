<?php
session_start(); // starts or resumes an existing session

//print_r($_POST); // for debugging purposes, display the content of the $_POST array

include 'dbConnection.php';

$conn = getDatabaseConnection("final_project");

$username = $_POST['username'];
$password = sha1($_POST['password']); //sha1($_POST['password']);

$sql = "SELECT * FROM fp_admin WHERE username = :username AND password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized, $dbConn = $connection
$stmt->execute($namedParameters);
$records = $stmt->fetch(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records);

if (empty($records)){
    //echo "Username or Password are incorrect!";
    
    header('location: login.php');
    
    $Color = "red";
    $Text = "Username or password is incorrect!";
    
    $_SESSION['error'] = '<div style="Color:'.$Color.'">'.$Text.'</div>' ;
}
else {
    //echo $records[0]['firstName']; // using fetchAll
    //echo $records['firstName'] . " " . $records['lastName']; //using fetch
    header('location: admin.php'); // redirecting to a new file
    
    $_SESSION['adminName'] = $records['firstName'] . " " . $records['lastName'] ; // stores adminName in server not browser
    $_SESSION['error'] = "" ;
}
?>