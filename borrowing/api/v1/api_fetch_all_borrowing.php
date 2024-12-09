<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $config = new Config();
    $res = $config->fetch_all_borrowing();

    $allRecord = [];

    while ($record  = mysqli_fetch_assoc($res)) {
        array_push($allRecord, $record);
    }

    if (!empty($allRecord)) {
        $response['data'] = $allRecord;
    } else {

        $response['msg'] = "Data is empty";
    }
} else {
    $response['error'] = "Only GET http request is allowed";
}

echo json_encode($response);
