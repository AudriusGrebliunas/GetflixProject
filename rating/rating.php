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

    if (isset($_GET['user_id']) && isset ($_GET['movie_id'])) {
        $user_id = $_GET['user_id'];
        $movie_id = $_GET['movie_id'];
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

// Update un film présent dans la wishlist d'un utilisate

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $user_id = isset($data['user_id']) ? $data['user_id'] : '';
        $movie_id = isset($data['movie_id']) ? $data['movie_id'] : '';
        $rating = isset($data['rating']) ? $data['rating'] : '';
    }
    if (empty($data["user_id"]) || empty($data["movie_id"]) || empty($data["rating"])) {
        echo createResponse('Error 401', 'Data missing', $data);
        exit;
    } else {
        $queryAdd = $db->prepare("UPDATE advices SET rating = :rating WHERE user_id = :user_id AND movie_id = :movie_id");
        try {
            $queryAdd->execute(["movie_id" => $movie_id, "user_id" => $user_id, "rating" => $rating]);
            echo createResponse("200", "Successfully updated rating", $data);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            echo createResponse("500", "Internal Server Error", []);
            exit;
        }
    }
}

// Supprimer 
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    if (isset($_GET['user_id']) && isset($_GET['movie_id'])) {
        $user_id = $_GET['user_id'];
        $movie_id = $_GET['movie_id'];
    }
    if (empty($user_id) || empty($movie_id)) {
        echo createResponse("400", "No user-id or movie-id submitted");
    }
    $queryFindRating = $db->prepare('SELECT * FROM advices WHERE user_id = :user_id AND movie_id = :movie_id');
    $queryFindRating->execute(['user_id' => $user_id, 'movie_id' => $movie_id]);
    $ratingExists = $queryFindRating->fetch(PDO::FETCH_ASSOC);
    if (!$ratingExists) {
        echo createResponse('404', 'ERROR: No rating found', $ratingExists);
        exit;
    } else {
        try {
            $queryDelete = $db->prepare('DELETE FROM advices WHERE user_id = :user_id AND movie_id = :movie_id');
            $queryDelete->execute(['movie_id' => $movie_id, 'user_id' => $user_id]);
            echo createResponse('200', 'Successfully deleted from the wishlist');
        } catch (PDOException $e) {
            error_log('' . $e->getMessage());
            echo createResponse('500', 'Internal Server Error', []);
            exit;
        }
    }
}











