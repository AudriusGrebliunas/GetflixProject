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

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if($data) {
        $name = isset($data['name']) ? $data['name'] : '';
        $author = isset($data['author']) ? $data['author'] : '';
        $resume = isset($data['resume']) ? $data['resume'] : '';
        $year = isset($data['year']) ? $data['year'] : '';
        $link_yt = isset($data['link_yt']) ? $data['link_yt'] : '';
        $image = isset($data['image']) ? $data['image'] : '';
        $inputGenreIds = isset($data['genre']) ? $data['genre'] : [];

    }


    

    if(empty($data["name"]) || empty($data["author"]) || empty($data["year"])) {
        echo createResponse('Error 401', 'Data missing', $data);
        exit;
    } else {
        $queryGenreId = $db->query("SELECT id FROM genre");
        $GenreId = $queryGenreId->fetchAll(PDO::FETCH_ASSOC);
        if(array_intersect($inputGenreIds, array_column($GenreId, 'id')) === $inputGenreIds || empty($inputGenreIds)) {

            /*Verification si film existe*/
            $queryVerification = $db->prepare("SELECT name, author, year FROM movies WHERE name = :name AND author = :author AND year = :year");
            $queryVerification->execute(["name" => $name, "author" => $author, "year" => $year]);
            $queryVerificationResults = $queryVerification->fetchAll(PDO::FETCH_ASSOC);
            if($queryVerificationResults) {
                echo createResponse('Error 402', 'Film already exists', $data);
            } else {
                /*Insertion film*/

                try {
                    $db->beginTransaction();

                    $queryAdd = $db->prepare("INSERT INTO movies (name, author, resume, year, link_yt, image) VALUES (:name, :author, :resume, :year, :link_yt, :image)");
                    $queryAdd->execute(["name" => $name, "author" => $author, "resume" => $resume, "year" => $year, "link_yt" => $link_yt, "image" => $image]);

                    $lastMovieId = $db->lastInsertId();
                    
                    $queryAddGenre = $db->prepare("INSERT INTO moviegenre (movie_id, genre_id) VALUES (:movie_id, :genre_id)");

                    foreach($inputGenreIds as $genre)
                    {
                    $queryAddGenre->execute(["movie_id"=> $lastMovieId, "genre_id" => $genre]);
                    }              
            
                    $db->commit();

                    echo createResponse("200", "Successfully added movie", $data);
                } catch (PDOException $e) {
                    error_log("Database Error: ".$e->getMessage());
                    echo createResponse("500", "Internal Server Error", []);
                    exit;
                }
            }
        }
        else {
            echo createResponse("407","Genre doesn't exist", $GenreId);
        }
    }
}