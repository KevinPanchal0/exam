<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents("php://input");

    parse_str($input, $_UPDATE);
    $name = $_UPDATE['name'];
    $gender = $_UPDATE['gender'];
    $age = $_UPDATE['age'];
    $contact_ID = $_UPDATE['contact_ID'];
    $Stud_ID = $_UPDATE['Stud_ID'];

    $config = new Config();

    $res = $config->update_students($name, $gender, $age, $contact_ID, $Stud_ID);


    if ($res) {
        $response['data'] = "Student Updated successfully...";
    } else {

        $response['data'] = "Student Updation failed...";
    }
} else {
    $response['error'] = "Only PUT and PATCH http request is allowed";
}

echo json_encode($response);
