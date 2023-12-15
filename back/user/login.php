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
        echo createResponse("500", "Error Server", []);
        exit;
    }

    $loginRow = $queryLogIn->fetch(PDO::FETCH_ASSOC);
    if ($loginRow && password_verify($password, $loginRow["password"])) {
        if ($loginRow["deleted"] == "0") {
<<<<<<< HEAD
            echo createResponse("200", "Log In Successful", $data);
        } elseif ($loginRow["deleted"] == "1") {
            echo createResponse("469", "Your account has been scheduled for deletion. You will be unable to create a new account with the same e-mail password.", $data);
        }
    } else {
        echo createResponse("403", "No Login/Password combination found, Are you registered ?", $data);
=======
            echo createResponse("200", "Log In Successfull", $data);
        } else if ($loginRow["deleted"] == "1") {
            echo createResponse("469", "Your account has been scheduled for deletion. You will be unable to create a new account with the same e-mail password.", $data);
        }
    } else {
        echo createResponse("403", "No Login/Password combinaison found, Are you registered ?", $data);
>>>>>>> 4c382ab1da711adfa9626a9db32bd5c9e0a283aa
        exit;
    }
}




