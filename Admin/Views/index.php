<?php
include '../../Config/db.php';
include '../Models/quizzes.php';
include '../Models/quesAns.php';
include '_header.php';
include '../../Global/global.php';
session_start();

if (isset($_SESSION['accountAdmin'])) {
    if (isset($_GET['act']) && $_GET['act'] != "") {
        switch ($_GET['act']) {
            case 'home':
                include '_home.php';
                break;

            case 'listQuiz':
                $quizzes = showQuizzes();
                include 'quizzes/listQuizz.php';
                break;

            case 'addQuiz':
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $imageName = $_FILES['image']['name']; // tên ảnh lấy từ form
                    $fileImage = $dir_img . time() . basename($imageName); // basename(): lấy ra tên file từ đường dẫn
                    move_uploaded_file($_FILES['image']['tmp_name'], $fileImage); // move từ thư mục tạm chứa file sang file đích muốn đưa đến
                    addQuizzes($title, $fileImage);
                    echo "<script> window.location.href='?act=listQuiz';</script>";
                }
                include 'quizzes/addQuiz.php';
                break;

            case 'updateQuiz':
                if (isset($_GET['idQuiz']) && $_GET['idQuiz'] > 0) {
                    $idQuiz = $_GET['idQuiz'];
                    $quiz = getOneQuiz($idQuiz);
                }
                if (isset($_POST['submit'])) {
                    $idQuiz = $_POST['idQuiz'];
                    $title = $_POST['title'];
                    $imageName = $_FILES['image']['name']; // tên ảnh lấy từ form
                    $fileImage = $dir_img . time() . basename($imageName); // basename(): lấy ra tên file từ đường dẫn
                    move_uploaded_file($_FILES['image']['tmp_name'], $fileImage);

                    updateQuiz($idQuiz, $title, $fileImage, $imageName);
                    echo "<script> window.location.href='?act=listQuiz';</script>";
                }
                include 'quizzes/updateQuiz.php';
                break;

            case 'deleteQuiz':
                if (isset($_GET['idQuiz']) && $_GET['idQuiz'] > 0) {
                    deleteQuiz($_GET['idQuiz']);
                }
                echo "<script> window.location.href='?act=listQuiz';</script>";
                break;

            case 'listQuestion':
                if (isset($_GET['idQuiz']) && $_GET['idQuiz'] > 0) {
                    $questions = getQuestions($_GET['idQuiz']);
                    $questions_ = getQuestions_($_GET['idQuiz']);
                    $_SESSION['idQuiz'] = $_GET['idQuiz'];
                }
                include 'questions_answers/listQuestion.php';
                break;

            case 'listAnswers':
                if (isset($_GET['idQues']) && $_GET['idQues'] > 0) {
                    $answers = getAnswers($_GET['idQues']);
                }
                include 'questions_answers/listAnswer.php';
                break;

            case 'addQuesAns':
                if (isset($_POST['submit'])) {

                    $question = $_POST['question'];
                    $answerCorrect = $_POST['answerCorrect'];
                    // var_dump($answerCorrect);

                    // lấy ra id question cuối vừa thêm
                    $idQuestion = addQuestion($question, $_SESSION['idQuiz']);
                    // var_dump($idQuestion);

                    // mảng câu trả lời
                    $answers = $_POST['answer'];
                    // var_dump($answers);

                    // thêm câu trả lời theo idQuestion
                    foreach ($answers as $key => $answer) {
                        $isCorrect = ($key == $answerCorrect) ? 1 : 0;
                        addAnswer($answer, $isCorrect, $idQuestion);
                    }
                    echo "<script> window.location.href='?act=listQuestion&idQuiz=" . $_SESSION['idQuiz'] . "';</script>";
                }
                include 'questions_answers/addQuesAns.php';
                break;

            case 'updateQuesAns':
                if (isset($_GET['idQues']) && $_GET['idQues'] > 0) {
                    $question = getOneQuestion($_GET['idQues']);
                    $answers = getAnswers($_GET['idQues']);
                }

                if (isset($_POST['submit'])) {
                    $idQues = $_POST['idQues'];
                    $question = $_POST['question'];

                    // mảng idAnswers
                    $idAnswers = $_POST['idAns'];
                    // mảng answers
                    $answers = $_POST['answer'];
                    // đáp án đúng
                    $answerCorrect = $_POST['answerCorrect'];
                    // sửa question
                    updateQuestion($question, $idQues);

                    // sửa answer
                    foreach ($idAnswers as $key => $idAnswer) {
                        $answer = $answers[$key];
                        $isCorrect = ($key == $answerCorrect) ? 1 : 0;
                        updateAnswer($answer, $isCorrect, $idAnswer);
                    }
                    echo "<script> window.location.href='?act=listQuestion&idQuiz=" . $_SESSION['idQuiz'] . "';</script>";
                }
                include 'questions_answers/updateQuesAns.php';
                break;

            default:
                include '_home.php';
                break;
        }
    } else {
        include '_home.php';
    }
}else{
    echo "can dang nhap tai khoan admin!!!!!";
}
include '_footer.php';
