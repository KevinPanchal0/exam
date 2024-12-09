<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trans_name = $_POST['trans_name'];
    $Stud_ID = $_POST['Stud_ID'];
    $borrowing_ID = $_POST['borrowing_ID'];
    $trans_date = $_POST['trans_date'];


    $config = new Config();

    $res = $config->insert_transaction($trans_name, $Stud_ID, $borrowing_ID, $trans_date);


    if ($res) {
        $response['data'] = "transaction Added successfully...";
    } else {

        $response['data'] = "transaction Adding failed...";
    }
} else {
    $response['error'] = "Only POST http request is allowed";
}

echo json_encode($response);
