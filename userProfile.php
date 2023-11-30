<?php 

include 'db_connect.php';
include 'request_config.php';

function createResponse($status, $message, $data = [])
{
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $email = isset($data['email']) ? $data['email'] : '';
    }

    if (empty($data["email"])) {
        echo createResponse('Error 401', 'Data missing');
        exit;
    }

    $queryUserData = $db->prepare("SELECT first_name, last_name, address, email, dob, password FROM users WHERE email = :email");
    try {
        $queryUserData->execute(["email" => $email]);
        $UserData=$queryUserData->fetchAll(PDO::FETCH_ASSOC);
        echo createResponse("200", "Successfully retrieved data", $UserData);
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        echo createResponse("500", "Internal Server Error");
        exit;
    }
}
