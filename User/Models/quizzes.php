<?php
function getAllQuizzes()
{
    $sql = "SELECT * FROM quizzes ";
    $result = pdo_query($sql);
    return $result;
}

function getOneQuiz($id_quiz)
{
    $sql = "SELECT * FROM questions 
    JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
    WHERE quizzes.id_quiz = $id_quiz";
    $result = pdo_query($sql);
    return $result;
}

function getOneQuiz_($id_quiz) // lấy 1 tên title
{
    $sql = "SELECT * FROM questions 
    JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
    WHERE quizzes.id_quiz = $id_quiz";
    $result = pdo_query_one($sql);
    return $result;
}

function getAllAnswers($id_question)
{
    $sql = "SELECT * FROM answers 
    JOIN questions ON answers.id_question=questions.id_question 
    WHERE answers.id_question= $id_question";
    $result = pdo_query($sql);
    return $result;
}

function getAnswersCorrect($id_question)  {
    $sql = "SELECT * FROM `answers` WHERE id_question = $id_question AND is_correct = 1";
    $result = pdo_query_one($sql);
    return $result;
}
