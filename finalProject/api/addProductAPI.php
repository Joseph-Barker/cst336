<?php

    include '../dbConnection.php';
    $conn = getDatabaseConnection("final_project");
    
    $arr = array();
    
    $arr[":productName"] = $_GET["productName"];
    $arr[":productDescription"] = $_GET["productDescription"];
    $arr[":productImage"] = $_GET["productImage"];
    $arr[":productPrice"] = $_GET["productPrice"];
    $arr[":catId"] = $_GET["catId"];
    
    $sql = "INSERT INTO fp_product ( `productName`, `productDescription`, `productImage`, `productPrice`, `catId`) 
    VALUES (:productName, :productDescription, :productImage, :productPrice, :catId)";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $sql ="SELECT COUNT(1) totalproducts FROM fp_product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($records);
    
    ?>