<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    $trans_name = $_UPDATE['trans_name'];
    $Stud_ID = $_UPDATE['Stud_ID'];
    $borrowing_ID = $_UPDATE['borrowing_ID'];
    $trans_date = $_UPDATE['trans_date'];
    $trans_ID = $_UPDATE['trans_ID'];

    $config = new Config();

    $res = $config->update_transactions($trans_name, $Stud_ID, $borrowing_ID, $trans_date, $trans_ID);


    if ($res) {
        $response['data'] = "transactions Updated successfully...";
    } else {

        $response['data'] = "transactions Updation failed...";
    }
} else {
    $response['error'] = "Only PUT and PATCH http request is allowed";
}

echo json_encode($response);
