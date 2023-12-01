<?php

include("db_connect.php");
include("request_config.php");

function createResponse($status, $message) {
    $response = [
        "status"=> $status,
        "message"=> $message
    ];
    return json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    if (isset($_GET["name"])) {
    $movieid = $_GET["name"];
    else {
        echo createResponse('400',"Unvalid Moviename provided");
    }
    $queryFindMovie = $db->prepare('SELECT * FROM movies WHERE id = :id');
    $queryFindMovie->execute([':id'=> $movieid]);
    $movie = $queryFindMovie->fetch(PDO::FETCH_ASSOC);
    
}