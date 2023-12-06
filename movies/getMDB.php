<?php

include '../db_connect.php';
include '../request_config.php';

// Récupération de l'input
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['q'])) {
        $name = $_GET['q'];
    }
    if (empty($name)) {
        echo createResponse('400', 'ERROR: Invalid movie name supplied', []);
        exit;
    }
}

// Call de l'API
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?&include_adult=false&language=en-US&page=1&query=" . urlencode($name),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyYTRjYjg5Nzk4NDRjN2JiMjY0ZWZmYWUyYTBmNjAzNSIsInN1YiI6IjY1NmYxYzBjODgwNTUxMDEzYTQ5ZThjNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.PphCzFg3AfFHo21RlOCC4146tjL1xwVlmrHVFlfvfFw",
        "accept: application/json"
    ],
]);

$responseAPI = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo createResponse(500, "cURL Error: $err", []);
} else {
    $responseDecoded = json_decode($responseAPI, true);

    if (isset($responseDecoded['results'])) {
        //$poster_paths = [];
        $url_poster = [];
        $releases = [];

        // Get Image Link
        foreach ($responseDecoded['results'] as $movie) {
            if (isset($movie['poster_path']) && $movie['poster_path'] !== null) {
                $url_poster[] = "https://www.themoviedb.org/t/p/w1280{$movie['poster_path']}";
            }
            else{
                $url_poster[] = "";
            }
            ////
            if (isset($movie['title']) && $movie['title'] !== null) {
                $titles[] = $movie['title'];
            }
            // if (isset($movie['genre']) && $movie['genre'] !== null) {
            //     $genres[] = $movie['genre'];
            //}
            if (isset($movie['overview']) && $movie['overview'] !== null) {
                $overviews[] = $movie['overview'];
            }
            else{
                $overviews[] = '';
            }
            if (isset($movie['release_date']) && $movie['release_date'] !== null) {
                $date = DateTime::createFromFormat("Y-m-d", $movie['release_date']);
        
                if ($date !== false) {
                    $year = $date->format('Y');
                    $releases[] = $year;
                } else {
                    $releases[] = '';
                }
            }
        }
        echo createResponse(200, 'lol', $releases);
    } else {
        echo createResponse(500, 'Error in TMDb API response', []);
    }
}



function createResponse($status, $message, $data = [])
{
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return json_encode($response);
}
?>