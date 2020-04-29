<?php

$query_string = $_SERVER["QUERY_STRING"];
parse_str($query_string,$query);
$barcode_value = $query["barcode"]:

$product0bj = new stdClass();
$product0bj->productList = array();

$db_connection = new mysqli(
        "sasalab-1_db_1",
        "user",
        "password",
        "db");

if ($db_connection->connect_error){
        die("connection failed: ". $db_connection->connection_error);
}

$results = $db_connection->query("SELECT * FROM 'item' WHERE `barcode`='L-DIN-AR01'");
if ($results){
        foreach($results as $row){
            $item = new stdClass();
            $item->name = $row["name"];
            $item->barcode = $row["barcode"];
            $product0bj->productList[] = $item;
        }
}
// converte l'oggetto in stringa JSON
$ productJson = json_encode ( $ productObj );

// restituisce la stringa al client
echo  $ productJson ;


?>