<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);
    $Stat_ID = $_DELETE['Stat_ID'];

    $config = new Config();

    $res = $config->delete_book_status_by_ID($Stat_ID);


    if ($res) {
        $response['data'] = "Borrow Deleted successfully...";
    } else {

        $response['data'] = "Borrow Deletion failed...";
    }
} else {
    $response['error'] = "Only DELETE http request is allowed";
}

echo json_encode($response);
