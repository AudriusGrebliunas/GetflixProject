<?php 

include '../db_connect.php';
include '../request_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $rawData = file_get_contents('php://input');
    $data = json_decode(($rawData), true);

    if ($data) {
        $password= isset($data['password']) ? $data['password'] : '';
    }

    if (empty($data["password"])) {
        echo createResponse('Error 403', 'Please enter a new password', $data);
        exit;
    }
    else {
        $queryRegister = $db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, address = :address, dob = :dob, password = :password WHERE email = :email");
        try {
            $queryRegister->execute(["first_name" => $first_name, "last_name" => $last_name, "address" => $address, "dob" => $dob, "email" => $email, "password" => $password]);
            echo createResponse("200", "Successfully modified user data");
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());

            echo createResponse("503", "Internal Server Error");
            exit;
        }
    }
}