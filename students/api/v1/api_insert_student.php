<?php


header("Access-Control-Type-Methods: POST");
header("COntent-Type: application/json");

include "../../config/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact_ID = $_POST['contact_ID'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $config = new Config();

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $res = $config->insert_student($name, $gender, $age, $contact_ID, $email, $hashed_pass);


    if ($res) {
        $response['data'] = "Student Added successfully...";
    } else {

        $response['data'] = "Student Adding failed...";
    }
} else {
    $response['error'] = "Only POST http request is allowed";
}

echo json_encode($response);
