<?php

    include '../dbConnection.php';
    $conn = getDatabaseConnection("final_project");

    $productId = $_GET['productId'];
    
    $sql = "SELECT * FROM fp_product WHERE productId = $productId";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($product);

?>