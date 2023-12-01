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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $name = isset($data['name']) ? $data['name'] : '';
        $author = isset($data['author']) ? $data['author'] : '';
        $resume = isset($data['resume']) ? $data['resume'] : '';
        $year = isset($data['year']) ? $data['year'] : '';
        $link_yt = isset($data['link_yt']) ? $data['link_yt'] : '';
        $image = isset($data['image']) ? $data['image'] : '';
        $genre = isset($data['genre']) ? $data['genre'] : '';
        
    }

    if (empty($data["name"]) || empty($data["author"]) || empty($data["resume"]) || empty($data["year"]) || empty($data["link_yt"]) || empty($data["image"]) || empty($data["genre"])) {
        echo createResponse('Error 401', 'Data missing', $data);
        exit;
    }

    // $queryVerification = $db->query("SELECT email FROM users");
    // $email_rows = $queryVerification->fetchAll(PDO::FETCH_ASSOC);
    // $email_list = array_column($email_rows, 'email');
    // if ((in_array($email, $email_list))) {
    //     echo createResponse("Error 420", "Email already in use");
    //     exit;
    // } else {
        $queryAdd = $db->prepare("INSERT INTO movies (name, author, resume, year, link_yt, image, genre) VALUES (:name, :author, :resume, :year, :link_yt, :image, :genre)");
        try {
            $queryAdd->execute(["name" => $name, "author" => $author, "resume" => $resume, "year" => $year, "link_yt" => $link_yt, "image" => $image, "genre"=> $genre]);
            echo createResponse("200", "Successfully added movie", $data);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());

            echo createResponse("500", "Internal Server Error", []);
            exit;
        }
    }
