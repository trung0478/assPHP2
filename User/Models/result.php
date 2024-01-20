<?php
function addResult($score, $idUser, $idQuiz, $question_quantity)
{
    $sql = "INSERT INTO result VALUES(NULL, $score, $idUser, $idQuiz, $question_quantity)";
    pdo_execute($sql);
}

function showResults($idUser)
{
    $sql = "SELECT * FROM result JOIN quizzes on result.id_quiz = quizzes.id_quiz WHERE result.id_user =$idUser";
    $result = pdo_query($sql);
    return $result;
}

function countResult($idUser)  {
    $sql = "SELECT id_user, COUNT(DISTINCT id_quiz) AS quiz_count FROM result WHERE id_user = $idUser GROUP BY id_user";
    $result = pdo_query($sql);
    return $result;
}
