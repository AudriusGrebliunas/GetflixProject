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
        $url_poster = [];
        $releases = [];
        $x=0;
        // Get Image Link
        foreach ($responseDecoded['results'] as $movie) {
            if (isset($movie['poster_path']) && $movie['poster_path'] !== null) {
                $url_poster= "https://www.themoviedb.org/t/p/w1280{$movie['poster_path']}";
            } else {
                $url_poster= "";
            }
            ////
            if (isset($movie['title']) && $movie['title'] !== null) {
                $title= $movie['title'];
            }
            if (isset($movie['genre_ids']) && $movie['genre_ids'] !== null) {
                $genre= $movie['genre_ids'];
            } else {
                $genre= '';
            }
            if (isset($movie['overview']) && $movie['overview'] !== null) {
                $overview= $movie['overview'];
            } else {
                $overview = '';
            }
            if (isset($movie['release_date']) && $movie['release_date'] !== null) {
                $date = DateTime::createFromFormat("Y-m-d", $movie['release_date']);

                if ($date !== false) {
                    $year = $date->format('Y');
                    $release= $year;
                } else {
                    $release= '';
                }
            }
            if (isset($movie['id']) && $movie['id'] !== null) {
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.themoviedb.org/3/movie/" . $movie['id'] . "/credits?language=en-US",
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

                $responseCredits = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $responseCreditsDecoded = json_decode($responseCredits, true);
                    if (isset($responseCreditsDecoded["crew"])) {
                        foreach ($responseCreditsDecoded["crew"] as $crewMember) {
                            if ($crewMember['job'] === "Director") {
                                $directorName = $crewMember["name"];
                            }
                        }
                    }
                }

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.themoviedb.org/3/movie/" . $movie['id'] . "/videos?language=en-US",
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

                $movieYT = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $movieYT = json_decode($movieYT, true);
                    if (!isset($movieYT["results"]) || empty($movieYT["results"]) || !$movieYT["results"]) {
                        $YouTubeLink = "";
                    } else {
                        foreach ($movieYT["results"] as $YTLink) {
                            if ($YTLink["site"] === "YouTube" && $YTLink["iso_639_1"] == "en") {
                                $YouTubeLink = "https://www.youtube.com/watch?v=" . $YTLink["key"];
                                break;
                            }

                        }
                    }
                }
            }
            
            $movieData = [
                'name'=>$title,
                'author'=>$directorName,
                'resume'=>$overview,
                'year'=>$release,
                'link_yt'=>$YouTubeLink,
                'image'=>$url_poster,
                'genre'=>$genre
                ];
            $moviesData[] = $movieData;
        }
        $data = json_encode($moviesData);
        echo createResponse('200', 'lol2', $moviesData);
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