<?php

    
    include '../dbConnection.php';
    $conn = getDatabaseConnection("final_project");

    $sql = "SELECT catId, catName FROM fp_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?>