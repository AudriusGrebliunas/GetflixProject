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

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    // $data = json_decode(file_get_contents('php://input'), true);
    $email;

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }
    if (empty($email)) {
        echo createResponse('Error 401', 'Data missing', $email);
        exit;
    }
    /***VERIFICATION EXISTENCE COMPTE */

    $queryVerification = $db->prepare("SELECT email FROM users WHERE email = :email");
    $queryVerification->execute(["email" => $email]);
    $email_rows = $queryVerification->fetchAll(PDO::FETCH_ASSOC);
    $email_list = array_column($email_rows, 'email');

    if (!(in_array($email, $email_list))) {
        echo createResponse("Error 420", "Profile doesn't exist", $email);
        exit;}

    /**FLAG DU COMPTE POUR SUPPRESSION */

    $queryUserDelete = $db->prepare("UPDATE users SET deleted = 1 WHERE email = :email");
    try {
        $queryUserDelete->execute(["email"=>$email]);
        echo createResponse("200", "Account scheduled for deletion", []);
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        echo createResponse("500", "Internal Server Error");
        exit;
    }
}
