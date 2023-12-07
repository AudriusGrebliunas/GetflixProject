<?php

include '../db_connect.php';
include '../request_config.php';

function createResponse($status, $message)
{
    $response = [
        'status' => $status,
        'message' => $message
    ];
    return json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $answer = isset($data['answer']) ? $data['answer'] : '';
    }

    if (empty($data["answer"])) {
        echo createResponse('Error 401', 'Answer missing');
        exit;
    }

    $queryQuestionAnswer = $db->query("SELECT questionanswer FROM users");
    $queryQuestionAnswerResult = $queryQuestionAnswer->fetch(PDO::FETCH_ASSOC);
    //$queryQuestionAnswerResult = array_column($queryQuestionAnswerResult, 'questionanswer');


    if (password_verify($password, $queryQuestionAnswerResult["questionanswer"])) {
        echo createResponse("200", "SUCCESS.");
        exit;
    } else {
        echo createResponse("400", "WRONG ANSWER.");
    }
}
