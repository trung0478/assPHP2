<?php

namespace App\Models\User;

use App\Models\DB;

class Result extends DB
{
    public function addResult($score, $idUser, $idQuiz, $question_quantity)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO result VALUES(NULL, $score, $idUser, $idQuiz, $question_quantity, '$date')";
        $this->pdo_execute($sql);
    }

    public function showResults($idUser)
    {
        $sql = "SELECT DISTINCT * FROM result JOIN quizzes on result.id_quiz = quizzes.id_quiz WHERE result.id_user = $idUser GROUP BY quizzes.title";
        return $this->pdo_query($sql);
    }

    public function showDetailResults($idQuiz)
    {
        $sql = "SELECT * FROM result JOIN quizzes on result.id_quiz = quizzes.id_quiz WHERE result.id_quiz = $idQuiz ";
        return $this->pdo_query($sql);
    }

    public function countResult($idUser)
    {
        $sql = "SELECT id_user, COUNT(DISTINCT id_quiz) AS quiz_count FROM result WHERE id_user = $idUser GROUP BY id_user";
        return $this->pdo_query($sql);
    }
    public function countQuantityQuiz($idQuiz)
    {
        $sql = "SELECT COUNT(result.id_quiz) as quantityQuiz FROM result WHERE result.id_quiz = $idQuiz";
        return $this->pdo_query($sql);
    }
}
