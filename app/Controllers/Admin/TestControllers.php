<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Quizzes;

class TestControllers
{
    public function listQuiz()
    {
        $quizzesModels = new Quizzes();
        $listQuiz = $quizzesModels->showQuizzes();

        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/quizzes/listQuizz.php';
        include 'app/Views/Admin/_footer.php';

    }

    public function addQuizInterface()
    {
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/quizzes/addQuiz.php';
        include 'app/Views/Admin/_footer.php';
    }

    public function addQuiz() {
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $imageName = $_FILES['image']['name']; // tên ảnh lấy từ form
            $fileImage = "app/Public/image/" . time() . basename($imageName); // basename(): lấy ra tên file từ đường dẫn
            move_uploaded_file($_FILES['image']['tmp_name'], $fileImage); // move từ thư mục tạm chứa file sang file đích muốn đưa đến

            $quizzesModels = new Quizzes();
            $quizzesModels->addQuizzes($title, $fileImage);

            header("Location:".BASE_URL."test");
        }
    }

    public function updateQuizInterface() {
        if (isset($_GET['idQuiz']) && $_GET['idQuiz'] > 0) {
            $idQuiz = $_GET['idQuiz'];

            $quizzesModels = new Quizzes();
            $quiz = $quizzesModels->getOneQuiz($idQuiz);
        }
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/quizzes/updateQuiz.php';
        include 'app/Views/Admin/_footer.php';
    } 

    public function updateQuiz() {
        if (isset($_POST['submit'])) {
            $idQuiz = $_POST['idQuiz'];
            $title = $_POST['title'];
            $imageName = $_FILES['image']['name']; // tên ảnh lấy từ form
            $fileImage = "app/Public/image/". time() . basename($imageName); // basename(): lấy ra tên file từ đường dẫn
            move_uploaded_file($_FILES['image']['tmp_name'], $fileImage);

            $quizzesModels = new Quizzes();
            $quizzesModels->updateQuiz($idQuiz, $title, $fileImage, $imageName);

            header("Location:".BASE_URL."test");
        }
    }

    public function deleteQuiz() {
        if (isset($_GET['idQuiz']) && $_GET['idQuiz'] > 0) {
            $quizzesModels = new Quizzes();
            $quizzesModels->deleteQuiz($_GET['idQuiz']);
        }
        header("Location:".BASE_URL."test");
    }


}
