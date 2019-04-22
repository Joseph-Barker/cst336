<?php

$email = $_GET['email'];
$access_token = "7fba00d66f6d179917a84b71e62dcbf00cd666fd4112f391efe658199f7a8d86";
$details = true;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://verifier.meetchopra.com/verify/'. $email .'?token='. $access_token);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'Error:'. curl_error($ch);
    }
    
    curl_close ($ch);
    echo $result;

?>