<?php
function showQuizzes()  {
    $sql="SELECT * FROM quizzes ";
    $result=pdo_query($sql);
    return $result;
}
?>