<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $status_name = $_POST['status_name'];


    $config = new Config();

    $res = $config->insert_book_status($book_id, $status_name);


    if ($res) {
        $response['data'] = "Book Status Added successfully...";
        http_response_code(201);
    } else {

        $response['data'] = "Book Status Adding failed...";
    }
} else {
    $response['error'] = "Only POST http request is allowed";
}

echo json_encode($response);
