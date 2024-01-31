<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\QuesAns;

class QuesAnsControllers extends BaseController
{
    protected $QuesAnsModels;

    public function __construct()
    {
        return $this->QuesAnsModels = new QuesAns();
    }

    public function listQuestion($idQuiz)
    {
        $questions = $this->QuesAnsModels->getQuestions($idQuiz);
        $questions_ = $this->QuesAnsModels->getQuestions_($idQuiz);
        $_SESSION['idQuiz'] = $idQuiz;

        $title="Câu hỏi";
        $this->render('Admin.questions_answers.listQuestion',compact('questions','questions_','title'));
    }

    public function listAnswer($idQues)
    {
        $answers = $this->QuesAnsModels->getAnswers($idQues);

        $title="Câu trả lời";
        $this->render('Admin.questions_answers.listAnswer',compact('answers','title'));
    }

    public function addQuesAnsInterface()
    {
        $title="Thêm câu hỏi, câu trả lời";
        $this->render('Admin.questions_answers.addQuesAns',compact('title'));
    }

    public function addQuesAns()
    {
        if (isset($_POST['submit'])) {
            $question = $_POST['question'];
            $answerCorrect = $_POST['answerCorrect'];
            // var_dump($answerCorrect);

            // lấy ra id question cuối vừa thêm
            $idQuestion =  $this->QuesAnsModels->addQuestion($question, $_SESSION['idQuiz']);
            // var_dump($idQuestion);

            // mảng câu trả lời
            $answers = $_POST['answer'];
            // var_dump($answers);

            // thêm câu trả lời theo idQuestion
            foreach ($answers as $key => $answer) {
                $isCorrect = ($key == $answerCorrect) ? 1 : 0;
                $this->QuesAnsModels->addAnswer($answer, $isCorrect, $idQuestion);
            }
            header("Location:" . BASE_URL . "listQuestion_" . $_SESSION['idQuiz']);
        }
    }

    public function updateQuesAnsInterface($idQues)
    {
        $question = $this->QuesAnsModels->getOneQuestion($idQues);
        $answers = $this->QuesAnsModels->getAnswers($idQues);

        $title="Sửa câu hỏi, câu trả lời";
        $this->render('Admin.questions_answers.updateQuesAns',compact('question','answers','title'));
    }

    public function updateQuesAns($idQues)
    {
        if (isset($_POST['submit'])) {
            // $idQues = $_POST['idQues'];
            $question = $_POST['question'];

            // mảng idAnswers
            $idAnswers = $_POST['idAns'];
            // mảng answers
            $answers = $_POST['answer'];
            // đáp án đúng
            $answerCorrect = $_POST['answerCorrect'];


            // sửa question
            $this->QuesAnsModels->updateQuestion($question, $idQues);

            // sửa answer
            foreach ($idAnswers as $key => $idAnswer) {
                $answer = $answers[$key];
                $isCorrect = ($key == $answerCorrect) ? 1 : 0;
                $this->QuesAnsModels->updateAnswer($answer, $isCorrect, $idAnswer);
            }
            header("Location:" . BASE_URL . "listQuestion_" . $_SESSION['idQuiz']);
        }
    }
}
