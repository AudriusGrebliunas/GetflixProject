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
    $rawData = file_get_contents('php://input');
    $data = json_decode(($rawData), true);

    if ($data) {
        $password= isset($data['password']) ? $data['password'] : '';
        $email= isset($data['email']) ? $data['email'] :'';
    }

    if (empty($data["password"])) {
        echo createResponse('Error 403', 'Please enter a new password', $data);
        exit;
    }
    else {
        $password = password_hash(
            $password,
            PASSWORD_ARGON2ID,
            [
                'memory_cost' => 2048,
                'time_cost'   => 4,
                'threads'     => 2,
            ]
        );
        $queryPassword = $db->prepare("UPDATE users SET password = :password WHERE email = :email");
        try {
            $queryPassword->execute(["email" => $email, "password" => $password]);
            echo createResponse("200", "Successfully modified password");
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            echo createResponse("503", "Internal Server Error");
            exit;
        }
    }
}