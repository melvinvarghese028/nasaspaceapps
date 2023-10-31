<?php

include_once __DIR__ . '/System.php';
$obj = new System();
$responseArray =  $obj->contact_us();
// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    header('Content-Type: application/json');
    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
