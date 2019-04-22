<?php

    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("valid_emails");

    $email = $_GET["email"];
    $arr = array();
    
    $arr[":email"] = $_GET["email"];
    $sql = "INSERT INTO emails (`email_address`) 
            VALUES (:email)";
                
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>