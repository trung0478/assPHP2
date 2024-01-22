<?php
function showQuizzes()
{
    $sql = "SELECT * FROM quizzes ";
    $result = pdo_query($sql);
    return $result;
}

function addQuizzes($title, $image)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO quizzes VALUES(NULL, '$title', '$image','$date')";
    pdo_execute($sql);
}

function getOneQuiz($idQuiz)
{
    $sql = "SELECT * FROM quizzes WHERE id_quiz=$idQuiz";
    $result = pdo_query_one($sql);
    return $result;
}

function updateQuiz($idQuiz, $title, $fileImage, $imageName)
{
    // $imageName: tên ảnh nhập từ from
    // $fileImage: đường dẫn đến ảnh
    // $quiz['image']: ảnh trên csdl
    $quiz = getOneQuiz($idQuiz);
    if ($imageName !== "") {
        if ($quiz['image'] !== "") {
            $oldImage = "../../Public/image/" . $quiz['image'];
            unlink($oldImage);
        }
        $sql = "UPDATE quizzes SET title= '" . $title . "', image ='" . $fileImage . "' WHERE id_quiz = $idQuiz ";
    } else {
        $sql = "UPDATE quizzes SET title= '" . $title . "' WHERE id_quiz = $idQuiz";
    }
    pdo_execute($sql);
}

function deleteQuiz($idQuiz)
{
    $sql = "DELETE FROM quizzes WHERE id_quiz=$idQuiz";
    $quiz = getOneQuiz($idQuiz);

    if ($quiz['image'] !== "") {
        $oldImage = "../../Public/image/" . $quiz['image'];
        unlink($oldImage);
    }
    
    pdo_execute($sql);
}
