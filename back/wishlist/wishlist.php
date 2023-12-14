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

// Retrouver les films dans la wishlist d'un utilisateur

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }
    if (empty($email)) {
        echo createResponse("400", "No email submitted");
        exit;
    }

    $queryEmail = $db->prepare("SELECT email FROM users WHERE email = :email");
    $queryEmail->execute(['email' => $email]);
    $queryEmailResult = $queryEmail->fetchAll();
    if (!$queryEmailResult) {
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
    wishlist.status
FROM
    wishlist
JOIN
    users ON wishlist.user_id = users.id
JOIN
    movies ON wishlist.movie_id = movies.id
WHERE users.email = :email");
        try {
            $queryGet->execute(["email" => $email]);
            $wishlist = $queryGet->fetchAll(PDO::FETCH_ASSOC);
            if ($wishlist) {
                echo createResponse('200', 'Successful operation', $wishlist);
            } else {
                echo createResponse('400', 'Email not found. Do you have any movie in your wishlist?', $wishlist);
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            echo createResponse("500", "Internal Server Error", []);
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
        $status = isset($data['status']) ? $data['status'] : '';
    }
    if (empty($data["user_id"]) || empty($data["movie_id"]) || empty($data["status"])) {
        echo createResponse('Error 401', 'Data missing', $data);
        exit;
    } else {
        $queryAdd = $db->prepare("UPDATE wishlist SET status = :status WHERE user_id = :user_id AND movie_id = :movie_id");
        try {
            $queryAdd->execute(["movie_id" => $movie_id, "user_id" => $user_id, "status" => $status]);
            echo createResponse("200", "Successfully updated wishlist", $data);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            echo createResponse("500", "Internal Server Error", []);
            exit;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    if (isset($_GET['user_id']) && isset($_GET['movie_id'])) {
        $user_id = $_GET['user_id'];
        $movie_id = $_GET['movie_id'];
    }
    if (empty($user_id) || empty($movie_id)) {
        echo createResponse("400", "No user-id or movie-id submitted");
    }
    $queryFindWishlist = $db->prepare('SELECT * FROM wishlist WHERE user_id = :user_id AND movie_id = :movie_id');
    $queryFindWishlist->execute(['user_id' => $user_id, 'movie_id' => $movie_id]);
    $wishlistExists = $queryFindWishlist->fetch(PDO::FETCH_ASSOC);
    if (!$wishlistExists) {
        echo createResponse('404', 'ERROR: No wishlist found', $wishlistExists);
        exit;
    } else {
        try {
            $queryDelete = $db->prepare('DELETE FROM wishlist WHERE user_id = :user_id AND movie_id = :movie_id');
            $queryDelete->execute(['movie_id' => $movie_id, 'user_id' => $user_id]);
            echo createResponse('200', 'Successfully deleted from the wishlist');
        } catch (PDOException $e) {
            error_log('' . $e->getMessage());
            echo createResponse('500', 'Internal Server Error', []);
            exit;
        }
    }
}