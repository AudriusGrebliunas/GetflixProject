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

    if (isset ($_GET['movieName'])) {
        $name = $_GET['movieName'];
    }
    else {
        echo createResponse("400", "No email submitted");
        exit;
    }

    $queryId = $db->prepare("SELECT id FROM users WHERE id = :id");
    $queryId->execute(['id' => $user_id]);
    $queryIDresult = $queryId->fetchAll(PDO::FETCH_ASSOC);
    if (!$queryIDresult) {
        echo createResponse("401", "Your email doesn't exist");
    } else {
        $queryGet = $db->prepare("SELECT
    users.email,
    movies.author,
    movies.genre,
    movies.image,
    movies.link_yt,
    movies.name,
    movies.resume,
    movies.year,
    advices.rating
FROM
    advices
JOIN
    users ON advices.user_id = users.id
JOIN
    movies ON advices.movie_id = movies.id
WHERE users.id = :user_id AND movies.id = :movie_id");
        try {
            $queryGet->execute(["user_id" => $user_id, "movie_id"=> $movie_id]);
            $ratingMovie = $queryGet->fetchAll(PDO::FETCH_ASSOC);
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