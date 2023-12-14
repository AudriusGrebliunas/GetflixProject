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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $queryAllRatings = $db->query("SELECT movie_id, AVG(rating) AS average_rating FROM advices GROUP BY movie_id ORDER BY average_rating DESC;");
    $allRatings = $queryAllRatings->fetchAll(PDO::FETCH_ASSOC);
    if (!$allRatings) {
        echo createResponse("401", "Table doesn't contain any ratings");
        exit;
    }
    echo createResponse("200", "All ratings retrieved", $allRatings);
}
