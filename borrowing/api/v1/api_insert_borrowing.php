<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Book_ID = $_POST['Book_ID'];
    $Stud_ID = $_POST['Stud_ID'];
    $date_borrowed = $_POST['date_borrowed'];
    $date_return = $_POST['date_return'];


    $config = new Config();

    $res = $config->insert_borrowing($Book_ID, $Stud_ID, $date_borrowed, $date_return);


    if ($res) {
        $response['data'] = "Borrow Added successfully...";
        http_response_code(201);
    } else {

        $response['data'] = "Borrow Adding failed...";
    }
} else {
    $response['error'] = "Only POST http request is allowed";
}

echo json_encode($response);
