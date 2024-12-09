<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);
    $book_ID = $_DELETE['book_ID'];

    $config = new Config();

    $res = $config->delete_book_by_ID($book_ID);


    if ($res) {
        $response['data'] = "Student Deleted successfully...";
    } else {

        $response['data'] = "Student Deletion failed...";
    }
} else {
    $response['error'] = "Only DELETE http request is allowed";
}

echo json_encode($response);
