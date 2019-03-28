<?php
    
    $seed = $_GET['seed'];
    $guess = $_GET['guess'];
    
    $output = array();
    $lower = true;
    $win = false;
    srand($seed);
    $ranNumber = rand(1, 99);
    
    if ($guess > $ranNumber) {
        $lower = false;
    }
    if ($guess == $ranNumber){
        $win = true;
    }
    $output["lower"] = $lower;
    $output["win"] = $win;
    $output["ranNumber"] = $ranNumber;

    echo json_encode($output);
    
?>