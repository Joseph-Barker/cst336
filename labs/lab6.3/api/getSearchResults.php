<?php

include '../dbConnection.php';
$conn = getDatabaseConnection("ottermart");

//This query works bbut it allows sql injection <because it's using single quotes)
//$sql = "SELECT * FROM `om_product` WHERE productName LIKE '%$product%'";

$namedParameters = array();
$sql = "SELECT * FROM om_product WHERE 1";

//checks whether user has typped something in the "Product" text box
if (!empty($_GET['product'])) {
    $sql .= " AND productName LIKE :productName";
    $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
}
//checks whether user has selected a category of product
if(!empty($_GET['category'])) {
    $sql .= " AND catID = :categoryId";
    $namedParameters[":categoryId"] = $_GET['category'];
}
//checks whether user has typed something in the price text boxes
if (!empty($_GET['priceFrom'])) {
    $sql .= " AND price >= :priceFrom";
    $namedParameters[":priceFrom"] = $_GET['priceFrom'];
}
//checks whther user has typed something in the price text boxes
if (!empty($_GET['priceTo'])) {
    $sql .= " AND price <= :priceTo";
    $namedParameters[":priceTo"] = $_GET['priceTo'];
}
//checks if the user has selected a radio button
if (isset($_GET['orderBy'])) {
    if ($_GET['orderBy'] == "price"){
        $sql .= " ORDER BY price";
    }
    else if($_GET['orderBy'] == "name") {
        $sql .= " ORDER BY productName";
    }
    
}

$stmt = $conn->prepare($sql); //$connection MUST be previously initialized
$stmt->execute($namedParameters); // We NEED to include $namedParameters here
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
echo json_encode($records);

//print_r($record); //debugging

?>