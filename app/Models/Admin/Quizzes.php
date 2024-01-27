<?php

namespace App\Models\Admin;

use App\Models\DB;

class Quizzes extends DB
{
    function showQuizzes()
    {
        $sql = "SELECT * FROM quizzes ";
        return $this->pdo_query($sql);
    }

    function addQuizzes($title, $image)
    {
        $date = date('Y-m-d');
        $sql = "INSERT INTO quizzes VALUES(NULL, '$title', '$image','$date')";
        $this->pdo_execute($sql);
    }

    function getOneQuiz($idQuiz)
    {
        $sql = "SELECT * FROM quizzes WHERE id_quiz=$idQuiz";
        return $this->pdo_query_one($sql);
    }

    function updateQuiz($idQuiz, $title, $fileImage, $imageName)
    {
        // $imageName: tên ảnh nhập từ from
        // $fileImage: đường dẫn đến ảnh
        // $quiz['image']: ảnh trên csdl
        $quiz = $this->getOneQuiz($idQuiz);
        if ($imageName !== "") {
            if ($quiz['image'] !== "") {
                $oldImage = $quiz['image'];
                unlink($oldImage);
            }
            $sql = "UPDATE quizzes SET title= '" . $title . "', image ='" . $fileImage . "' WHERE id_quiz = $idQuiz ";
        } else {
            $sql = "UPDATE quizzes SET title= '" . $title . "' WHERE id_quiz = $idQuiz";
        }
        $this->pdo_execute($sql);
    }

    function deleteQuiz($idQuiz)
    {
        $sql = "DELETE FROM quizzes WHERE id_quiz=$idQuiz";
        $quiz =  $this->getOneQuiz($idQuiz);

        if ($quiz['image'] !== "") {
            $oldImage = $quiz['image'];
            unlink($oldImage);
        }
        $this->pdo_execute($sql);
    }
}
