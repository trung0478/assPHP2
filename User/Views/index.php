<?php
include 'Config/db.php';
include 'User/Models/accounts.php';
include 'User/Models/quizzes.php';
include 'User/Models/result.php';

session_start();


include 'User/Views/_header.php';

$quizzes = getAllQuizzes();
// $_SESSION['account']="1111";


if (isset($_GET['act']) && $_GET['act'] != '') {
    switch ($_GET['act']) {
        case 'home':
            include 'User/Views/_home.php';
            break;

        case 'login':
            if (isset($_POST['login'])) {
                $acc = $_POST['account'];
                $pass = $_POST['pass'];
                $login = login($acc, $pass);
                var_dump($login);
                if (is_array($login)) {
                    $_SESSION['account'] = $login;
                    $_SESSION['id_account'] = $login['id_user'];
                    $_SESSION['role'] = $login['role'];
                    echo "<script> window.location.href='?act=home';</script>";
                } else {
                    $invalidLogin = "Sai tài khoản hoặc mật khẩu";
                }
            }
            include 'User/Views/login.php';
            break;

        case 'register':
            if (isset($_POST['register'])) {
                register($_POST['account'], $_POST['email'], $_POST['pass']);
                echo "<script> window.location.href='?act=login';</script>";
            }
            include 'User/Views/register.php';
            break;

        case 'forgetPass':
            if (isset($_POST['submit'])) {
                $sendPass = check_email($_POST['email']);
            }
            include 'User/Views/forgetPass.php';
            break;

        case 'logout':
            session_unset();
            echo "<script> window.location.href='?act=home';</script>";
            break;

        case 'test':
            if (isset($_GET['idquiz']) && $_GET['idquiz'] > 0) {
                if (isset($_SESSION['account'])) {
                    $quiz_ = getOneQuiz_($_GET['idquiz']);
                    $quiz = getOneQuiz($_GET['idquiz']);
                    include 'User/Views/start.php';
                } else {
                    $messageLogin = "Vui lòng đăng nhập để thực hiện bài kiểm tra";
                    include 'User/Views/login.php';
                }
            }
            break;

        case 'start':
            if (isset($_POST['idquiz']) && $_POST['idquiz'] > 0) {
                $quiz_ = getOneQuiz_($_POST['idquiz']);
                $quiz = getOneQuiz($_POST['idquiz']);
                include 'User/Views/test.php';
            }
            break;

        case 'submit':
            if (isset($_POST['submit'])) {
                $quiz_ = getOneQuiz_($_POST['idQuiz']);
                // lấy ra đáp án người dùng chọn
                $answers = $_POST['answer'];
                // foreach ($answers as $idQues => $idAns) {
                //    echo $idQues.'_'. $idAns;
                // }
                // echo "<pre>";
                // print_r($answers);
                // echo "</pre>";

                // lấy ra mảng id câu trả đúng với mỗi câu hỏi
                $answersCorrect = $_POST['idAnswerCorrect'];
                // echo "<pre>";
                // print_r($answersCorrect);
                // echo "</pre>";

                $score = 0;
                foreach ($answers as $id_question => $selected_answer) {
                    // Kiểm tra xem câu trả lời của người dùng có trùng với câu trả lời đúng không
                    if ($selected_answer == $answersCorrect[$id_question]) {
                        // Nếu trùng, tăng điểm số lên 1
                        $score++;
                    }
                }
                // lưu thông tin kết quả lên csdl
                addResult($score, $_SESSION['id_account'], $_POST['idQuiz'], count($answers));
                include 'User/Views/result.php';
            }
            break;

        case 'testHistory':
            if (isset($_SESSION['id_account']) && $_SESSION['id_account'] > 0) {
                $results = showResults($_SESSION['id_account']);
                $countQuiz= countResult($_SESSION['id_account']);

                if (count($countQuiz)>0) {
                    include 'User/Views/testHistory.php';
                } else {
                    echo "<script> window.location.href='?act=emptyHistory';</script>";
                }
            }
            break;

        case 'emptyHistory':
            include 'User/Views/emptyHistiory.php';
            break;

        default:
            include 'User/Views/_home.php';
            break;
    }
} else {
    include 'User/Views/_home.php';
}

include 'User/Views/_footer.php';
// }
