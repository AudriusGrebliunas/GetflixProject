<?php

include '../db_connect.php';
include '../request_config.php';

function createResponse($status, $message, $data = [])
{
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // $data = file_get_contents('php://input');
 $data = json_decode(file_get_contents('php://input'), true);
    // file_put_contents('put_request.log', $data);
 if ($data) {
        $first_name = isset($data['first_name']) ? $data['first_name'] : '';
        $last_name = isset($data['last_name']) ? $data['last_name'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $dob = isset($data['dob']) ? $data['dob'] : '';
        $password = isset($data['password']) ? $data['password'] : '';
        $email = isset($data['email']) ? $data['email'] : '';

 }

    // if (empty($data["email"]) || empty($data["password"]) || empty($data["first_name"]) || empty($data["last_name"]) || empty($data["address"]) || empty($data["dob"])) {
    //     echo createResponse('Error 401', 'Data missing', $data);
    //     exit;
    // }

    $queryVerification = $db->query("SELECT email FROM users WHERE email = :email");
    $queryVerification->execute(["email"=>$email]);
    $email_rows = $queryVerification->fetchAll(PDO::FETCH_ASSOC);
    $email_list = array_column($email_rows, 'email');
    if (!(in_array($email, $email_list))) {
        echo createResponse("Error 420", "Profile doesn't exist");
        exit;
    } else {
        $queryRegister = $db->prepare("UPDATE TABLE users SET first_name = :first_name, last_name = :last_name, address = :address, dob = :dob, password = :password WHERE email = :email");
        try {
            $queryRegister->execute(["first_name" => $first_name, "last_name" => $last_name, "address" => $address, "dob" => $dob, "email" => $email, "password" => $password]);
            echo createResponse("200", "Successfully registered");
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());

            echo createResponse("500", "Internal Server Error");
            exit;
        }
    }
}
