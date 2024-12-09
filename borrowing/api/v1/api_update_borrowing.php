<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    $Book_ID = $_UPDATE['Book_ID'];
    $Stud_ID = $_UPDATE['Stud_ID'];
    $date_borrowed = $_UPDATE['date_borrowed'];
    $date_return = $_UPDATE['date_return'];
    $borrowing_ID = $_UPDATE['borrowing_ID'];

    $config = new Config();

    $res = $config->update_borrowing($Book_ID, $Stud_ID, $date_borrowed, $date_return, $borrowing_ID);


    if ($res) {
        $response['data'] = "Borrow Updated successfully...";
    } else {

        $response['data'] = "Borrow Updation failed...";
    }
} else {
    $response['error'] = "Only PUT and PATCH http request is allowed";
}

echo json_encode($response);
