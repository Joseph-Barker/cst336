<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    $productId = $_GET['productId'];
    $sql = "SELECT *
            FROM om_product
            NATURAL JOIN om_purchase
            WHERE productId = :pId";
            
    $np = array();
    $np[':pId'] = $productId;
    $stmt = $conn->prepare($sql); //$connection MUST be previously initialized
    $stmt->execute($np); // We NEED to include $np here
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    echo json_encode($records);
?>