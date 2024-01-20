<?php
include '../../Config/db.php';
include '../Models/quizzes.php';
include '_header.php';
if (isset($_GET['act']) && $_GET['act'] != "") {
    switch ($_GET['act']) {
        case 'home':
            include '_home.php';
            break;

        case 'quizzes':
            $quizzes=showQuizzes();
            include 'quizzes.php';
            break;

        default:
            include '_home.php';
            break;
    }
} else {
    include '_home.php';
}
include '_footer.php';
