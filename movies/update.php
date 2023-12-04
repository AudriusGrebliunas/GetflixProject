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
        $genre = isset($data['genre']) ? $data['genre'] : '';
    }

    file_put_contents('put_data.log', $data);


    // if (empty($data["name"]) || empty($data["author"]) || empty($data["resume"]) || empty($data["year"]) || empty($data["link_yt"]) || empty($data["image"]) || empty($data["genre"]) || empty($data["id"])) {
    //     echo createResponse('Error 401', 'Data missing', $data);
    //     exit;
    // }
    file_put_contents('put_data.log', $data);

    $queryVerification = $db->prepare("SELECT id FROM movies WHERE id = :id");
    $queryVerification->execute(["id" => $id]);
    $id_rows = $queryVerification->fetchAll(PDO::FETCH_ASSOC);


    if (!$id_rows) {
        echo createResponse("Error 404", "Movie not found", $id);
        exit;
    } else {
        $queryModify = $db->prepare("UPDATE movies 
        SET 
            name = IF(:name = '', name, :name),
            author = IF(:author = '', author, :author),
            resume = IF(:resume = '', resume, :resume),
            year = IF(:year = '', year, :year),
            link_yt = IF(:link_yt = '', link_yt, :link_yt),
            image = IF(:image = '', image, :image),
            genre = IF(:genre = '', genre, :genre)
        WHERE id = :id");
        try {
            $queryModify->execute([
                "name" => $name,
                "author" => $author,
                "resume" => $resume,
                "year" => $year,
                "link_yt" => $link_yt,
                "image" => $image,
                "genre" => $genre,
                "id" => $id
            ]);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());

            echo createResponse("500", "Internal Server Error", []);
            exit;
        }
    }
}
