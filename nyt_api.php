<?php
header('Content-type: application/json');

$curl = curl_init();
// Will return the response, if false it print the response
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// Disable SSL verification
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$inputage = $_GET['inputAge'];

$query = array(
    "api-key" => "18de8761a9c54c1c9a054e1920a8031f",
    "age-group" => "$inputage",);
curl_setopt($curl, CURLOPT_URL,
    "http://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json" . "?" . http_build_query($query)
    );

$data = json_encode(json_decode(curl_exec($curl)));
echo $data;
?>