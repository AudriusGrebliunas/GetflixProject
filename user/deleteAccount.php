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

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['email'])) {
        $email = $data['email'];
    }
    if (empty($email)) {
        echo createResponse('Error 401', 'Data missing', $data);
        exit;
    }

    $queryUserDelete = $db->prepare("UPDATE users SET deleted = 1 WHERE email = :email");
    try {
        $queryUserDelete->execute(["email"=>$email]);
        echo createResponse("200", "Account scheduled for deletion", []);
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        echo createResponse("500", "Internal Server Error");
        exit;
    }
}
