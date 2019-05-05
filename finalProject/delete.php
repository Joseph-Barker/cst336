<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    header('location: login.php'); //sends users to login screen if they haven't logged in
}

    include 'dbConnection.php';
    $conn = getDatabaseConnection("final_project");

    $sql = "DELETE FROM `fp_product` WHERE `fp_product`.`productId` = " . $_POST['productId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
   // echo $sql;
    
    header("Location: admin.php");



?>