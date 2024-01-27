<?php

namespace App\Models\Admin;

use App\Models\DB;

class QuesAns extends DB
{
    public function getQuestions($id_quiz)
    {
        $sql = "SELECT * FROM questions 
        JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
        WHERE quizzes.id_quiz = $id_quiz";
        return $this->pdo_query($sql);
    }

    public function getQuestions_($id_quiz)
    {
        $sql = "SELECT * FROM questions 
        JOIN quizzes ON quizzes.id_quiz = questions.id_quiz 
        WHERE quizzes.id_quiz = $id_quiz";
        return $this->pdo_query_one($sql);
    }

    public function getOneQuestion($id_ques)
    {
        $sql = "SELECT * FROM questions WHERE id_question=$id_ques";
        return $this->pdo_query_one($sql);
    }

    public function getAnswers($id_ques)
    {
        $sql = "SELECT * FROM questions 
        JOIN answers ON answers.id_question =questions.id_question 
        WHERE questions.id_question = $id_ques";
        return $this->pdo_query($sql);
    }

    public function addQuestion($question, $idQuiz)
    {
        $sql = "INSERT INTO questions VALUES(NULL, '$question', $idQuiz)";
        return $this->pdo_execute_lastInsertId($sql);
    }

    public function addAnswer($answer, $is_correct, $idQues)
    {
        $sql = "INSERT INTO answers VALUES(NULL, '$answer', $is_correct, $idQues)";
        $this->pdo_execute($sql);
    }

    public function updateQuestion($question, $idQues)
    {
        $sql = "UPDATE questions SET question = '$question' WHERE id_question=$idQues";
        $this->pdo_execute($sql);
    }

    public function updateAnswer($answer, $is_correct, $idAnswer)
    {
        $sql = "UPDATE answers SET answer = '$answer', is_correct = $is_correct WHERE id_answer=$idAnswer";
        $this->pdo_execute($sql);
    }
}
