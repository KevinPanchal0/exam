<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    $bk_title = $_UPDATE['bk_title'];
    $author = $_UPDATE['author'];
    $pub_date = $_UPDATE['pub_date'];
    $Stat_ID = $_UPDATE['Stat_ID'];
    $book_ID = $_UPDATE['book_ID'];

    $config = new Config();

    $res = $config->update_books($bk_title, $author, $pub_date, $Stat_ID, $book_ID);


    if ($res) {
        $response['data'] = "Student Updated successfully...";
    } else {

        $response['data'] = "Student Updation failed...";
    }
} else {
    $response['error'] = "Only PUT and PATCH http request is allowed";
}

echo json_encode($response);
