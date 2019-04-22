<?php

    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("valid_emails");

    $arr = array();
    $arr[":email"] = $_GET["email"];
    $arr[":status"] = $_GET["status"];    
    
    $arr[":email"] = $_GET["email"];
    $sql = "INSERT INTO `emails` (`email_address`, `status`) VALUES (:email, :status)";
                
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>