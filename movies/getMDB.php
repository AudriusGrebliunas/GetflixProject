<?php

include '../db_connect.php';
include '../request_config.php';

//Récupération de l'input

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
  CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?&include_adult=false&language=en-US&page=1&query=".urlencode($name),
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
  echo "cURL Error #:" . $err;
} else {



//Create Response
$responseDecoded = json_decode($responseAPI, true);
echo createResponse(200,'Here is your result', $responseDecoded);
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

// echo createResponse(200,'Here is your result', $responseAPI);
/**RECHERCHER UN OU PLUSIEURS FILM AVEC SON NOM */


