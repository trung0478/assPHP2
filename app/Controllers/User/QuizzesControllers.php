<?php

namespace App\Controllers\User;

use App\Models\User\Quizzes;
use App\Models\User\Result;

class QuizzesControllers
{
    public function quiz()
    {
        if (isset($_GET['idquiz']) && $_GET['idquiz'] > 0) {
            if (isset($_SESSION['account'])) {
                $QuizzesModels = new Quizzes();
                $quiz_ = $QuizzesModels->getOneQuiz_($_GET['idquiz']);
                $quiz = $QuizzesModels->getOneQuiz($_GET['idquiz']);
                include 'app/Views/User/_header.php';
                include 'app/Views/User/Tests/start.php';
                include 'app/Views/User/_footer.php';
            } else {
                $messageLogin = "Vui lòng đăng nhập để thực hiện bài kiểm tra";
                include 'app/Views/User/_header.php';
                include 'app/Views/User/Accounts/login.php';
                include 'app/Views/User/_footer.php';
            }
        }
    }

    public function start()
    {
        if (isset($_POST['idquiz']) && $_POST['idquiz'] > 0) {
            $QuizzesModels = new Quizzes();
            $quiz_ = $QuizzesModels->getOneQuiz_($_POST['idquiz']);
            $quiz = $QuizzesModels->getOneQuiz($_POST['idquiz']);
            include 'app/Views/User/_header.php';
            include 'app/Views/User/Tests/test.php';
            include 'app/Views/User/_footer.php';
        }
    }

    public function submit()
    {
        if (isset($_POST['submit'])) {
            $QuizzesModels = new Quizzes();
            $quiz_ = $QuizzesModels->getOneQuiz_($_POST['idQuiz']);
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
            $resultModels = new Result();
            $resultModels->addResult($score, $_SESSION['id_account'], $_POST['idQuiz'], count($answers));
            include 'app/Views/User/_header.php';
            include 'app/Views/User/Tests/result.php';
            include 'app/Views/User/_footer.php';
        }
    }
}
