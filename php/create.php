<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once 'database.php';
    include_once 'adresse.php';
    $database = new database();
    $db = $database->getConnection();
    $item = new adresse($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->label = $data->label;
    $item->type = $data->type;
    $item->id = $data->id;
    $item->created = date('Y-m-d H:i:s');

    if($item->createAdresse()){
        echo 'adresse ajouté avec succèes !';
    } else{
        echo 'adresse could not be created.';
    }
?>
