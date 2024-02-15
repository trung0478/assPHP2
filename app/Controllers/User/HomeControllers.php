<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\Quizzes;

class HomeControllers extends BaseController
{
    protected $QuizzesModels;

    public function __construct()
    {
        return $this->QuizzesModels = new Quizzes();
    }

    public function home()
    {
        $quizzes = $this->QuizzesModels->getAllQuizzes();
        $title = "Trang chủ";
        $this->render('User._home', compact('quizzes', 'title'));
    }

    public function searchQuizzes() {
        if (isset($_POST['search'])) {
            $quizzes = $this->QuizzesModels->searchQuizzes($_POST['keyWord']);
            $title = "Tìm kiếm";
            $this->render('User._home', compact('quizzes', 'title'));
        }
    }
}
