<?php

namespace App\Controllers\User;

use App\Models\User\Result;

class ResultControllers
{
    public function testHistory()
    {
        $resultModels = new Result();
        $results = $resultModels->showResults($_SESSION['id_account']);
        $countQuiz = $resultModels->countResult($_SESSION['id_account']);

        if (count($countQuiz) > 0) {
            include 'app/User/Views/_header.php';
            include 'app/User/Views/testHistory.php';
            include 'app/User/Views/_footer.php';
        } else {
            include 'app/User/Views/_header.php';
            include 'app/User/Views/emptyHistiory.php';
            include 'app/User/Views/_footer.php';
        }
    }
}
