<?php
    $searchTerm = "scientific+name+of+monkey";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, "https://www.google.com/search?q=$searchTerm");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($ch);
    curl_close($ch);
?>