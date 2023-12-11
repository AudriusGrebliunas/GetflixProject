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


    $queryAllMovies = $db->query("SELECT * EXCEPT id FROM movies");
    try {
        $AllMovies = $queryAllMovies->fetchAll(PDO::FETCH_ASSOC);
        if ($AllMovies) {
            echo createResponse('200', 'SUCCESS: Movies successfully retrieved', $AllMovies);
        } else {
            echo createResponse('401', 'ERROR: No movies found in the database', $AllMovies);
        }

    } catch (PDOexception $e) {
        error_log("Database error: " . $e->getMessage());
        echo createResponse('500', 'FAILURE: Internal Server Error');
        exit;
    }
}