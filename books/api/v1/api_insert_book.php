<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bk_title = $_POST['bk_title'];
    $author = $_POST['author'];
    $pub_date = $_POST['pub_date'];
    $Stat_ID = $_POST['Stat_ID'];

    
    $config = new Config();

    $res = $config->insert_book($bk_title, $author, $pub_date, $Stat_ID);


    if ($res) {
        $response['data'] = "Student Added successfully...";
    } else {

        $response['data'] = "Student Adding failed...";
    }
} else {
    $response['error'] = "Only POST http request is allowed";
}

echo json_encode($response);
