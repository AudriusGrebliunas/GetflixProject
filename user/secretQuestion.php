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
        $answer = isset($data['answer']) ? $data['answer'] : '';
        $email = isset($data['email']) ? $data['email'] : '';

    }

    if (empty($data["answer"]) || empty($data["email"]) ) {
        echo createResponse('Error 401', 'Data missing');
        exit;
    }

    $queryQuestionAnswer = $db->prepare("SELECT questionanswer FROM users WHERE email = :email");
    $queryQuestionAnswer->execute(["email"=>$email]);
    $queryQuestionAnswerResult = $queryQuestionAnswer->fetch(PDO::FETCH_ASSOC);
    //$queryQuestionAnswerResult = array_column($queryQuestionAnswerResult, 'questionanswer');


    if (password_verify($answer, $queryQuestionAnswerResult["questionanswer"])) {
        echo createResponse("200", "SUCCESS.");
        exit;
    } else {
        echo createResponse("400", "WRONG ANSWER");
    }
}
