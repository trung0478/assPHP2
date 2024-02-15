<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\Quizzes;
use App\Models\User\Result;

class QuizzesControllers extends BaseController
{
    protected $QuizzesModels;
    public function  __construct()
    {
        return $this->QuizzesModels = new Quizzes();
    }

    public function quiz($idQuiz)
    {
        if (isset($_SESSION['account'])) {
            $quiz_ = $this->QuizzesModels->getOneQuiz_($idQuiz);
            $quiz = $this->QuizzesModels->getOneQuiz($idQuiz);
            $title = "Bài kiểm tra";
            $this->render('User.Tests.start', compact('quiz_', 'quiz', 'title'));
        } else {
            $messageLogin = "Vui lòng đăng nhập để thực hiện bài kiểm tra";
            $title = "Đăng nhập";
            $this->render('User.Accounts.login', compact('messageLogin', 'title'));
        }
    }

    public function start($idQuiz)
    {
        $quiz_ = $this->QuizzesModels->getOneQuiz_($idQuiz);
        $quiz = $this->QuizzesModels->getOneQuiz($idQuiz);
        $QuizzesModels = new Quizzes();

        $title = "Bài kiểm tra";
        $this->render('User.Tests.test', compact('QuizzesModels', 'quiz_', 'quiz', 'title'));
    }

    public function submit()
    {
        if (isset($_POST['submit'])) {
            $QuizzesModels = new Quizzes();
            $quiz_ = $QuizzesModels->getOneQuiz_($_POST['idQuiz']);
            $quiz = $QuizzesModels->getOneQuiz($_POST['idQuiz']);

            // lấy ra mảng đáp án người dùng chọn
            $answers = $_POST['answer'];
            // echo "<pre>";
            // var_dump($answers);
            // echo "</pre>";

            // lấy ra mảng id câu trả đúng với mỗi câu hỏi
            $answersCorrect = $_POST['idAnswerCorrect'];

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
            $title = "Kết quả";
            $this->render('User.Tests.result', compact('answersCorrect', 'QuizzesModels', 'quiz', 'quiz_', 'score', 'answers', 'title'));
        }
    }
}
