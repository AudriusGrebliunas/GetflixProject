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

/**RECHERCHER UN OU PLUSIEURS FILM AVEC SON NOM */


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['q'])) {
        $name = $_GET['q'];
    }
    if (empty($name)) {
        echo createResponse('400', 'ERROR: Invalid movie name supplied', []);
        exit;
    }
    $queryMovieName = $db->prepare("SELECT movies.*, GROUP_CONCAT(genre.name SEPARATOR ', ') AS genres, AVG(advices.rating) as avg_rating 
    FROM movies 
    LEFT JOIN advices ON advices.movie_id = movies.id
    LEFT JOIN moviegenre ON moviegenre.movie_id = movies.id
    LEFT JOIN genre ON moviegenre.genre_id = genre.id
    WHERE movies.name LIKE :name
    GROUP BY movies.id");
    try {
        $queryMovieName->execute(['name' => "%$name%"]);
        $movieData = $queryMovieName->fetchAll(PDO::FETCH_ASSOC);
        if ($movieData) {
            echo createResponse('200', 'SUCCESS: Movie(s) successfully retrieved', $movieData);
        } else {
            echo createResponse('401', 'ERROR: No movie(s) found with that name', $movieData);
        }

    } catch (PDOexception $e) {
        error_log("Database error: " . $e->getMessage());
        echo createResponse('500', 'FAILURE: Internal Server Error');
        exit;
    }
}

/**METTRE A JOUR UN FILM */


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $id = isset($data['id']) ? $data['id'] : '';
        $name = isset($data['name']) ? $data['name'] : '';
        $author = isset($data['author']) ? $data['author'] : '';
        $resume = isset($data['resume']) ? $data['resume'] : '';
        $year = isset($data['year']) ? $data['year'] : '';
        $link_yt = isset($data['link_yt']) ? $data['link_yt'] : '';
        $image = isset($data['image']) ? $data['image'] : '';
    }


    $queryVerification = $db->prepare("SELECT id FROM movies WHERE id = :id");
    $queryVerification->execute(["id" => $id]);
    $id_rows = $queryVerification->fetchAll(PDO::FETCH_ASSOC);


    if (!$id_rows) {
        echo createResponse("402", "ERROR: Movie not found", $id);
        exit;
    } else {
        $queryModify = $db->prepare("UPDATE movies 
        SET 
            name = IF(:name = '', name, :name),
            author = IF(:author = '', author, :author),
            resume = IF(:resume = '', resume, :resume),
            year = IF(:year = '', year, :year),
            link_yt = IF(:link_yt = '', link_yt, :link_yt),
            image = IF(:image = '', image, :image)
        WHERE id = :id");
        try {
            $queryModify->execute([
                "name" => $name,
                "author" => $author,
                "resume" => $resume,
                "year" => $year,
                "link_yt" => $link_yt,
                "image" => $image,
                "id" => $id
            ]);
            echo createResponse("201", "SUCCESS: Movie successfully updated", $id);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());

            echo createResponse("501", "FAILURE: Internal Server Error", $data);
            exit;
        }
    }
}

/**SUPRESSION D'UN FILM */

if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    if (isset($_GET["id"])) {
        $movieid = $_GET["id"];
    } else {
        echo createResponse('403', "ERROR: Invalid Moviename provided");
        exit;
    }
    ;
    $queryFindMovie = $db->prepare('SELECT * FROM movies WHERE id = :id');
    $queryFindMovie->execute([':id' => $movieid]);
    $movie = $queryFindMovie->fetch(PDO::FETCH_ASSOC);
    if (!$movie) {
        echo createResponse('404', 'ERROR: Movie not found', []);
        exit;
    } else {
        try {
            $db->beginTransaction();

            $queryDeleteAdvices = $db->prepare("DELETE FROM advices WHERE movie_id IN (SELECT id FROM movies WHERE id = :id)");
            $queryDeleteAdvices->execute(['id' => $movieid]);

            $queryDeleteWishlist = $db->prepare("DELETE FROM wishlist WHERE movie_id IN (SELECT id FROM movies WHERE id = :id)");
            $queryDeleteWishlist->execute(['id' => $movieid]);

            $queryDeleteWishlist = $db->prepare("DELETE FROM moviegenre WHERE movie_id IN (SELECT id FROM movies WHERE id = :id)");
            $queryDeleteWishlist->execute(['id' => $movieid]);

            $queryDeleteMovies = $db->prepare("DELETE FROM movies WHERE id = :id");
            $queryDeleteMovies->execute(['id' => $movieid]);

            $db->commit();
            echo createResponse("202", "SUCCESS: Movie successfully deleted");
        } catch (PDOException $e) {
            echo createResponse("502", "FAILURE: Internal error", []);
            exit;
        }
        ;
    }
}
