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

    $queryUserData = $db->query("SELECT first_name, last_name, address, email, dob, question FROM users");
    try {
        $UserData=$queryUserData->fetchAll(PDO::FETCH_ASSOC);
        if ($UserData) {
            echo createResponse("200", "Successfully operation", $UserData);
        }
        else {
            echo createResponse("404","No users in database");
        }
        
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        echo createResponse("500", "Internal Server Error");
        exit;
    }
}

