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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    } else {
        echo createResponse(401, 'No user_id provided');
    }

    $queryGetByUser = $db->prepare('SELECT
    movies.id,
    movies.author,
    movies.genre,
    movies.image,
    movies.link_yt,
    movies.name,
    movies.resume,
    movies.year,
    advices.rating
    FROM advices
    JOIN movies ON advices.movie_id = movies.id 
    WHERE advices.user_id = :user_id');
    try {
        $queryGetByUser->execute(['user_id' => $user_id]);
        $userRating = $queryGetByUser->fetchAll(PDO::FETCH_ASSOC);
        echo createResponse(200, 'All User Ratings :', $userRating);
    } catch (PDOException $e) {
        echo createResponse(500, 'Internal Error Server', $e->getMessage());
    }
}