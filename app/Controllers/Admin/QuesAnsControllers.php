<?php

namespace App\Controllers\Admin;

use App\Models\Admin\QuesAns;

class QuesAnsControllers
{
    public function listQuestion()
    {
        if (isset($_GET['idQuiz']) && $_GET['idQuiz'] > 0) {
            $QuesAnsModels = new QuesAns();
            $questions = $QuesAnsModels->getQuestions($_GET['idQuiz']);
            $questions_ = $QuesAnsModels->getQuestions_($_GET['idQuiz']);
            $_SESSION['idQuiz'] = $_GET['idQuiz'];
        }
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/questions_answers/listQuestion.php';
        include 'app/Views/Admin/_footer.php';
    }

    public function listAnswer()
    {
        if (isset($_GET['idQues']) && $_GET['idQues'] > 0) {
            $QuesAnsModels = new QuesAns();
            $answers = $QuesAnsModels->getAnswers($_GET['idQues']);
        }
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/questions_answers/listAnswer.php';
        include 'app/Views/Admin/_footer.php';
    }

    public function addQuesAnsInterface()
    {
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/questions_answers/addQuesAns.php';
        include 'app/Views/Admin/_footer.php';
    }

    public function addQuesAns()
    {
        if (isset($_POST['submit'])) {
            $question = $_POST['question'];
            $answerCorrect = $_POST['answerCorrect'];
            // var_dump($answerCorrect);

            $QuesAnsModels = new QuesAns();

            // lấy ra id question cuối vừa thêm
            $idQuestion =  $QuesAnsModels->addQuestion($question, $_SESSION['idQuiz']);
            // var_dump($idQuestion);

            // mảng câu trả lời
            $answers = $_POST['answer'];
            // var_dump($answers);

            // thêm câu trả lời theo idQuestion
            foreach ($answers as $key => $answer) {
                $isCorrect = ($key == $answerCorrect) ? 1 : 0;
                $QuesAnsModels->addAnswer($answer, $isCorrect, $idQuestion);
            }
            header("Location:" . BASE_URL . "listQuestion&idQuiz=" . $_SESSION['idQuiz']);
        }
    }

    public function updateQuesAnsInterface()
    {
        if (isset($_GET['idQues']) && $_GET['idQues'] > 0) {
            $QuesAnsModels = new QuesAns();
            $question = $QuesAnsModels->getOneQuestion($_GET['idQues']);
            $answers = $QuesAnsModels->getAnswers($_GET['idQues']);
        }
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/questions_answers/updateQuesAns.php';
        include 'app/Views/Admin/_footer.php';
    }

    public function updateQuesAns()
    {
        if (isset($_POST['submit'])) {
            $idQues = $_POST['idQues'];
            $question = $_POST['question'];

            // mảng idAnswers
            $idAnswers = $_POST['idAns'];
            // mảng answers
            $answers = $_POST['answer'];
            // đáp án đúng
            $answerCorrect = $_POST['answerCorrect'];

            $QuesAnsModels = new QuesAns();

            // sửa question
            $QuesAnsModels->updateQuestion($question, $idQues);

            // sửa answer
            foreach ($idAnswers as $key => $idAnswer) {
                $answer = $answers[$key];
                $isCorrect = ($key == $answerCorrect) ? 1 : 0;
                $QuesAnsModels->updateAnswer($answer, $isCorrect, $idAnswer);
            }
            header("Location:" . BASE_URL . "listQuestion&idQuiz=" . $_SESSION['idQuiz']);
        }
    }
}
