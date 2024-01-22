<?php
function getQuestions($id_quiz)
{
    $sql = "SELECT * FROM questions 
    JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
    WHERE quizzes.id_quiz = $id_quiz";
    $result = pdo_query($sql);
    return $result;
}

function getQuestions_($id_quiz)
{
    $sql = "SELECT * FROM questions 
    JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
    WHERE quizzes.id_quiz = $id_quiz";
    $result = pdo_query_one($sql);
    return $result;
}

function getOneQuestion($id_ques)
{
    $sql = "SELECT * FROM questions WHERE id_question=$id_ques";
    $result = pdo_query_one($sql);
    return $result;
}

function getAnswers($id_ques)
{
    $sql = "SELECT * FROM questions 
    JOIN answers ON answers.id_question =questions.id_question 
    WHERE questions.id_question = $id_ques";
    $result = pdo_query($sql);
    return $result;
}

function addQuestion($question, $idQuiz)
{
    $sql = "INSERT INTO questions VALUES(NULL, '$question', $idQuiz)";
    return pdo_execute_lastInsertId($sql);
}

function addAnswer($answer, $is_correct, $idQues)
{
    $sql = "INSERT INTO answers VALUES(NULL, '$answer', $is_correct, $idQues)";
    pdo_execute($sql);
}

function updateQuestion($question, $idQues)
{
    $sql = "UPDATE questions SET question = '$question' WHERE id_question=$idQues";
    pdo_execute($sql);
}

function updateAnswer($answer, $is_correct, $idAnswer)
{
    $sql = "UPDATE answers SET answer = '$answer', is_correct = $is_correct WHERE id_answer=$idAnswer";
    pdo_execute($sql);
}
