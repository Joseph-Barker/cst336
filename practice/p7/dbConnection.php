<?php

function getDatabaseConnection($dbname = 'mid_practice'){
    
    $host = 'localhost'; //could 9
    //$dbname = 'tcp';
    $username = 'root';
    $password = '';
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>