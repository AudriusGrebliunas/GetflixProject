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

// Trouver un utilisateur par email

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }
    if (empty($email)) {
        echo createResponse('Error 401', 'Data missing');
        exit;
    }

    $queryUserData = $db->prepare("SELECT first_name, last_name, address, email, dob, password FROM users WHERE email = :email");
    try {
        $queryUserData->execute(["email" => $email]);
        $UserData=$queryUserData->fetchAll(PDO::FETCH_ASSOC);
        if ($UserData) {
            echo createResponse("200", "Successfully retrieved data", $UserData);
        }
        else {
            echo createResponse("405","User not found");
        }
        
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        echo createResponse("501", "Internal Server Error");
        exit;
    }
}

// Update un utilisateur par email
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $rawData = file_get_contents('php://input');
    $data = json_decode(($rawData), true);

    if ($data) {
        $first_name = isset($data['first_name']) ? $data['first_name'] : '';
        $last_name = isset($data['last_name']) ? $data['last_name'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $dob = isset($data['dob']) ? $data['dob'] : '';
        $password = isset($data['password']) ? $data['password'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
    }

    if (empty($data["email"]) || empty($data["password"]) || empty($data["first_name"]) || empty($data["last_name"]) || empty($data["address"]) || empty($data["dob"])) {
        echo createResponse('Error 403', 'Data missing', $data);
        exit;
    }

    $queryVerification = $db->prepare("SELECT email FROM users WHERE email = :email");
    $queryVerification->execute(["email" => $email]);
    $email_rows = $queryVerification->fetchAll(PDO::FETCH_ASSOC);
    $email_list = array_column($email_rows, 'email');


    if (!(in_array($email, $email_list))) {
        echo createResponse("Error 421", "Profile doesn't exist", $email);
        exit;
    } else {
        $queryRegister = $db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, address = :address, dob = :dob, password = :password WHERE email = :email");
        try {
            $queryRegister->execute(["first_name" => $first_name, "last_name" => $last_name, "address" => $address, "dob" => $dob, "email" => $email, "password" => $password]);
            echo createResponse("200", "Successfully modified user data");
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());

            echo createResponse("503", "Internal Server Error");
            exit;
        }
    }
}

// Supprimer un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    // $data = json_decode(file_get_contents('php://input'), true);
    $email;

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }
    if (empty($email)) {
        echo createResponse('Error 402', 'Data missing', $email);
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
        echo createResponse("502", "Internal Server Error");
        exit;
    }
}

