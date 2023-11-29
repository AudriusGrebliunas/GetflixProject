<?php 

include 'db_connect.php';
include 'request_config.php';

function createResponse($status, $message)
{
    $response = [
        'status' => $status,
        'message' => $message
    ];
    return json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $first_name = isset($data['first_name']) ? $data['first_name'] : '';
        $last_name = isset($data['last_name']) ? $data['last_name'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $dob = isset($data['dob']) ? $data['dob'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
        $password = isset($data['password']) ? $data['password'] : '';

    }

    if (empty($data["email"]) || empty($data["password"]) || empty($data["first_name"]) || empty($data["last_name"]) || empty($data["address"]) || empty($data["dob"])) {
        echo createResponse('Error 401', 'Data missing');
        exit;
    }

    $queryRegister = $db->prepare("INSERT INTO users (first_name, last_name, address, email, dob, password) VALUES (:first_name, :last_name, :address, :email, :dob, :password)");
    try {
        $queryRegister->execute(["first_name" => $first_name, "last_name" => $last_name, "address" => $address, "dob" => $dob, "email" => $email, "password" => $password ]);
        echo createResponse("200", "Successfully registered");
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
    
        echo createResponse("500", "Internal Server Error");
        exit;
    }
}
