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
        $movie_id = isset($data['movie_id']) ? $data['movie_id'] : '';
        $rating = isset($data['rating']) ? $data['rating'] : '';
    }

    if ( empty($data["user_id"]) || empty($data["movie_id"]) || empty($data["rating"]))
    { 
        echo createResponse('Error 401', 'Data missing', $data);
        exit;
    }
        else {
        $queryAdd = $db->prepare("INSERT INTO advices (user_id, movie_id, rating) VALUES (:user_id, :movie_id, :rating)");
        
        try {
            $queryAdd->execute(["user_id" => $user_id, "movie_id" => $movie_id, "rating" => $rating]);
            echo createResponse("200", "Rating Successfully added", $data);
        } catch (PDOException $e){ 
            error_log("Database Error: " . $e->getMessage());
            echo createResponse("500", "Internal Server Error", $data);
            exit;
        }
    }
}