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


// Retrouver le rating pour un utilisateur et un film donné

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset ($_GET['movie_id'])) {
        $id = $_GET['movie_id'];
    }
    else {
        echo createResponse("400", "No movie name submitted");
        exit;
    }

    $queryMovieId = $db->prepare("SELECT id FROM movies WHERE id = :id");
    $queryMovieId->execute(['id' => $id]);
    $movieId = $queryMovieId->fetchAll(PDO::FETCH_ASSOC);
    if (!$movieId) {
        echo createResponse("401", "No movie with that ID");
    } else {
        $queryGetRating = $db->prepare("SELECT
    movies.id,
    movies.author,
    movies.genre,
    movies.image,
    movies.link_yt,
    movies.name,
    movies.resume,
    movies.year,
    AVG(advices.rating) as avg_rating
FROM
    advices
JOIN
    movies ON advices.movie_id = movies.id
WHERE movies.id = :id
GROUP BY advices.movie_id");
        try {
            $queryGetRating->execute(["id" => $id]);
            $ratingMovie = $queryGetRating->fetchAll(PDO::FETCH_ASSOC);
            if ($ratingMovie) {
                echo createResponse('200', 'Successful operation', $ratingMovie);
            } else {
                echo createResponse('400', 'No rating for that movie', $ratingMovie);
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            echo createResponse("500", "Internal Server Error");
            exit;
        }
    }
}