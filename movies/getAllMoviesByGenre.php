<?php

include '../db_connect.php';
include '../request_config.php';

function createResponse($status, $message, $data = []) {
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return json_encode($response);
}


// Récupération de l'input
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['selectedGenre'])) {
        $selectedGenre = $_GET['selectedGenre'];
    }
    if (empty($selectedGenre)) {
        echo createResponse('400', 'ERROR: Invalid genre supplied', []);
        exit;
    }

    $moviesSameGenreQuery = $db->prepare("SELECT movies.*, GROUP_CONCAT(genre.name SEPARATOR ', ') AS genres FROM movies JOIN moviegenre on movies.id = moviegenre.movie_id JOIN genre on moviegenre.genre_id = genre.id WHERE genre_id = :genre_id GROUP BY movies.id;");
    $moviesSameGenreQuery->execute(["genre_id"=>$selectedGenre]);
    $moviesSameGenreQueryResult = $moviesSameGenreQuery->fetchAll(PDO::FETCH_ASSOC);
    if(!$moviesSameGenreQueryResult || empty($moviesSameGenreQueryResult) || !isset($moviesSameGenreQueryResult) ){
        echo createResponse('401', 'No movies with this genre found', []);
    }
    else{
        echo createResponse('200', 'Success!', $moviesSameGenreQueryResult);

    }
    






}

