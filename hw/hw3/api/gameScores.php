<?php
    $score = array();
    $scoreArray = array();
    
    $score["name"] = "eeny";
    $score["wins"] = "9001";
    $score["losses"] = "32";
    
    array_push($scoreArray, $score);
    
    $score["name"] = "meeny";
    $score["wins"] = "8445";
    $score["losses"] = "306";
    
    array_push($scoreArray, $score);
    
    
    $score["name"] = "miny";
    $score["wins"] = "6080";
    $score["losses"] = "423";
    
    array_push($scoreArray, $score);
    
    $score["name"] = "maria";
    $score["wins"] = "6055";
    $score["losses"] = "612";
    
    array_push($scoreArray, $score); 
    
    $score["name"] = "john";
    $score["wins"] = "4366";
    $score["losses"] = "812";
    
    array_push($scoreArray, $score); 
    
    
    echo json_encode($scoreArray);
    
?>