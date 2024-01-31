<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\Quizzes;

class HomeControllers extends BaseController
{
    public function home()
    {
        $QuizzesModels = new Quizzes();
        $quizzes = $QuizzesModels->getAllQuizzes();
        $title="Trang chủ";
        $this->render('User._home',compact('quizzes','title'));
    }
}
?>
