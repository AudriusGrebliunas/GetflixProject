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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $user_id = isset($data['user_id']) ? $data['user_id'] : '';
        $id = isset($data['movie_id']) ? $data['movie_id'] : '';
        $radius = isset($data['radius']) ? $data['radius'] : '';
    }
    if (empty($data["user_id"]) || empty($data["movie_id"]) || empty($data["radius"])){
        echo createResponse('Error 401', 'Data missing', $data);
        exit;
    } else {
        $queryAdd = $db->prepare("INSERT INTO wishlist (movie_id, user_id, status) VALUES (:movie_id, :user_id, :status)");
        try {
            $queryAdd->execute(["movie_id" => $id, "user_id" => $user_id, "status" => $radius]);
            echo createResponse("200", "Successfully added to wishlist", $data);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            echo createResponse("500", "Internal Server Error", []);
            exit;
        }
    }
}







