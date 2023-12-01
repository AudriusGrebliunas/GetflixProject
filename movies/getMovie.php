<?php 

include '../db_connect.php';
include '../request_config.php';

function createResponse ($status, $message, $data = []) {
    $response = [
    'status'=> $status, 
    'message'=> $message, 
    'data'=> $data
    ];
    return json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['q'])) {
        $name = $_GET['q'];
    }
    if (empty($name)) {
        echo createResponse('400', 'Invalid moviename supplied', []);
        exit;
    }
    $queryMovieName = $db->prepare("SELECT * FROM movies WHERE name LIKE :name");
    try {
        $queryMovieName->execute(['name'=> "%$name%"]);
        $movieData = $queryMovieName->fetchAll(PDO::FETCH_ASSOC);
        if($movieData) {
            echo createResponse('200', 'Successful operation', $movieData);
        } else {
            echo createResponse('404', 'No movie found with that name', $movieData);
        }

    }
    catch (PDOexception $e) {
        error_log("Database error: " . $e->getMessage());
        echo createResponse('500', 'Internal Server Error');
        exit;
    }
}