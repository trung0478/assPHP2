<?php

namespace App\Models\User;

use App\Models\DB;

class Quizzes extends DB
{
    public function getAllQuizzes()
    {
        $sql = "SELECT * FROM quizzes ";
        return $this->pdo_query($sql);
    }

    public function getOneQuiz($id_quiz)
    {
        $sql = "SELECT * FROM questions 
        JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
        WHERE quizzes.id_quiz = $id_quiz";
        return $this->pdo_query($sql);
    }

    public function getOneQuiz_($id_quiz) // lấy 1 tên title
    {
        $sql = "SELECT * FROM questions 
        JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
        WHERE quizzes.id_quiz = $id_quiz";
        return $this->pdo_query_one($sql);
    }

    public function getAllAnswers($id_question)
    {
        $sql = "SELECT * FROM answers 
        JOIN questions ON answers.id_question=questions.id_question 
        WHERE answers.id_question= $id_question";
        return $this->pdo_query($sql);
    }

    public function getAnswersCorrect($id_question)
    {
        $sql = "SELECT * FROM answers WHERE id_question = $id_question AND is_correct = 1";
        return $this->pdo_query_one($sql);
    }
}
