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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }
    if (empty($email)) {
        echo createResponse('Error 401', 'Data missing');
        exit;
    }

    $queryUserData = $db->prepare("SELECT first_name, last_name, address, email, dob, password FROM users WHERE email = :email");
    try {
        $queryUserData->execute(["email" => $email]);
        $UserData=$queryUserData->fetchAll(PDO::FETCH_ASSOC);
        if ($UserData) {
            echo createResponse("200", "Successfully retrieved data", $UserData);
        }
        else {
            echo createResponse("404","User not found");
        }
        
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        echo createResponse("500", "Internal Server Error");
        exit;
    }
}

