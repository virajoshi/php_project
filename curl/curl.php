<?php
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://www.stepin-solutions.in");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POST, true);
    $response = curl_exec($ch);
    
    echo $response;
?>