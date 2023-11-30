<?php
include 'db_connect.php';
include 'request_config.php';

function createResponse($status, $message, $data = [])
{
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return json_encode($response);
}

$data = json_decode(file_get_contents('php://input'), true);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($data) {
        $email = isset($data['email']) ? $data['email'] : '';
        $password = isset($data['password']) ? $data['password'] : '';
    }

    if (empty($data["email"]) || empty($data["password"])) {
        echo createResponse('Error 401', 'Email or password missing', []);
        exit;
    }

    $queryLogIn = $db->prepare("SELECT * FROM users WHERE email = :email");
    try {
        $queryLogIn->execute(["email" => $email]);
    } catch (PDOException $e) {
       echo createResponse ("500", "Error Server", []);
       exit;
    }

    $loginRow = $queryLogIn->fetch(PDO::FETCH_ASSOC);
    if ($password == $loginRow["password"]) {
        echo createResponse("200", "Log In Successfull", $data);
    } else {
        echo createResponse("403", "No Login/Password combinaison found, Are you registered ?", $data);
        exit;
    }
}




