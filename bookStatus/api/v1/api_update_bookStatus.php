<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    $book_id = $_UPDATE['book_id'];
    $status_name = $_UPDATE['status_name'];
    $Stat_ID = $_UPDATE['Stat_ID'];


    $config = new Config();

    $res = $config->update_book_status($book_id, $status_name, $Stat_ID);


    if ($res) {
        $response['data'] = "Borrow Updated successfully...";
    } else {

        $response['data'] = "Borrow Updation failed...";
    }
} else {
    $response['error'] = "Only PUT and PATCH http request is allowed";
}

echo json_encode($response);
