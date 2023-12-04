<?php

include("../db_connect.php");
include("../request_config.php");

function createResponse($status, $message) {
    $response = [
        "status"=> $status,
        "message"=> $message
    ];
    return json_encode($response);
};

if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    if (isset($_GET["id"])) {
    $movieid = $_GET["id"];
    }
    else {
        echo createResponse('400',"Unvalid Moviename provided");
        exit;
    };
    $queryFindMovie = $db->prepare('SELECT * FROM movies WHERE id = :id');
    $queryFindMovie->execute([':id'=> $movieid]);
    $movie = $queryFindMovie->fetch(PDO::FETCH_ASSOC);
    if (!$movie) {
        echo createResponse('404','Movie not found', []);
        exit;
    }
    else {
        try {
            $queryFetchMovie = $db->prepare("DELETE FROM movies WHERE id = :id");
            $queryFetchMovie->execute([':id' => $movie['id']]);
            echo createResponse("200","Movie successfully deleted");
        }
        catch (PDOException $e) {
            echo createResponse("500","Internal error", []);
            exit;
        };
    }
}
