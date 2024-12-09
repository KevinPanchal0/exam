<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);
    $borrowing_ID = $_DELETE['borrowing_ID'];

    $config = new Config();

    $res = $config->delete_borrowing_by_ID($borrowing_ID);


    if ($res) {
        $response['data'] = "Borrow Deleted successfully...";
    } else {

        $response['data'] = "Borrow Deletion failed...";
    }
} else {
    $response['error'] = "Only DELETE http request is allowed";
}

echo json_encode($response);
