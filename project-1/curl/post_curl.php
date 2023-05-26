<?php 
    $url = 'http://localhost/intership/data.php';
    $data = array(
        'param1' => 'viraj',
        'param2' => 'joshi'
    );
    
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POST, true,);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data); 

    $response = curl_exec($ch);
    curl_close($ch);
    echo $response; 
?>