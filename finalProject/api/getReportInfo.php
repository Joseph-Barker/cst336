<?php 

include '../dbConnection.php';
$conn = getDatabaseConnection("final_project");

 $action = $_GET['action'];

 $np = array();
 
  switch ($action) {
        
        case "history": //returns history of purchases  
                            $sql = "SELECT userId, firstName, lastName, purchaseId, productId, quantity, unitPrice, purchaseDate FROM fp_user NATURAL JOIN fp_purchase ORDER BY purchaseDate DESC";
                        break;
        case "totalRevenue": //returns quantity and unitPrice to be caluclated by js
                            $sql = "SELECT quantity, unitPrice FROM fp_purchase";
                        break;
        case "totalItemsSold": //returns sum of all items sold
                            $sql = "SELECT SUM(quantity) AS total FROM fp_purchase";
                        break;
        case "avgProductPrice": //returns price and sum of items sold, needed for js avg
                            $sql = "SELECT productPrice FROM fp_product";
                        break;                        
                        
    }//switch

    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    echo json_encode($records);    
?>