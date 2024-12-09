<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $borrowing_ID = $_POST['borrowing_ID'];

    $config = new Config();

    $res = $config->fetch_single_borrowing($borrowing_ID);


    $single_record = [];

    while ($record  = mysqli_fetch_assoc($res)) {
        array_push($single_record, $record);
    }

    if (!empty($single_record)) {
        $response['data'] = $single_record;
    } else {

        $response['msg'] = "Data is empty";
    }
} else {
    $response['error'] = "Only POST http request is allowed";
}

echo json_encode($response);