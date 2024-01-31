<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Quizzes;

class TestControllers extends BaseController
{
    protected $quizzesModels;

    public function __construct()
    {
        return $this->quizzesModels = new Quizzes();
    }

    public function listQuiz()
    {
        $listQuiz = $this->quizzesModels->showQuizzes();
        $title="Bài kiểm tra";
        $this->render('Admin.quizzes.listQuizz',compact('listQuiz','title'));
    }

    public function addQuizInterface()
    {
        $title="Thêm bài kiểm tra";
        $this->render('Admin.quizzes.addQuiz',compact('title'));
    }

    public function addQuiz()
    {
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $imageName = $_FILES['image']['name']; // tên ảnh lấy từ form
            $fileImage = "app/Public/image/" . time() . basename($imageName); // basename(): lấy ra tên file từ đường dẫn
            move_uploaded_file($_FILES['image']['tmp_name'], $fileImage); // move từ thư mục tạm chứa file sang file đích muốn đưa đến

            $this->quizzesModels->addQuizzes($title, $fileImage);

            header("Location:" . BASE_URL . "test");
        }
    }

    public function updateQuizInterface($idQuiz)
    {
        $quiz = $this->quizzesModels->getOneQuiz($idQuiz);
        $title="Sửa bài kiểm tra";
        $this->render('Admin.quizzes.updateQuiz',compact('quiz','title'));
    }

    public function updateQuiz($idQuiz)
    {
        if (isset($_POST['submit'])) {
            // $idQuiz lấy từ route       -> cách1
            // $idQuiz = $_POST['idQuiz'];-> cách2
            $title = $_POST['title'];
            $imageName = $_FILES['image']['name']; // tên ảnh lấy từ form
            $fileImage = "app/Public/image/" . time() . basename($imageName); // basename(): lấy ra tên file từ đường dẫn
            move_uploaded_file($_FILES['image']['tmp_name'], $fileImage);

            $this->quizzesModels->updateQuiz($idQuiz, $title, $fileImage, $imageName);

            header("Location:" . BASE_URL . "test");
        }
    }

    public function deleteQuiz($idQuiz)
    {
        $countIdQuiz = $this->quizzesModels->countIdQuiz($idQuiz);
        if ($countIdQuiz['soluong']<=0) {
            $this->quizzesModels->deleteQuiz($idQuiz);
            header("Location:" . BASE_URL . "test");
        }else{
            $listQuiz = $this->quizzesModels->showQuizzes();
            $message_noDelete='<h6 class="alert alert-danger">Bài kiểm tra vẫn còn câu hỏi, câu trả lời. Không thể xoá!!</h6>';
            $title="Bài kiểm tra";
            $this->render('Admin.quizzes.listQuizz',compact('listQuiz','title','message_noDelete'));
        }
    }
}
