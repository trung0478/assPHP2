<?php

namespace App\Controllers\User;

use App\Models\User\Quizzes;

class HomeControllers
{
    public function home()
    {
        $QuizzesModels = new Quizzes();
        $quizzes = $QuizzesModels->getAllQuizzes();
        include 'app/Views/User/_header.php';
        include 'app/Views/User/_home.php';
        include 'app/Views/User/_footer.php';
    }
}
