<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\Result;

class ResultControllers extends BaseController
{
    public function testHistory()
    {
        $resultModels = new Result();
        $results = $resultModels->showResults($_SESSION['id_account']);
        $countQuiz = $resultModels->countResult($_SESSION['id_account']);

        if (count($countQuiz) > 0) {
            $title="Lịch sử kiểm tra";
            $this->render('User.Historys.testHistory',compact('results','countQuiz','title'));
        } else {
            $title="Lịch sử kiểm tra";
            $this->render('User.Historys.emptyHistiory',compact('title'));
        }
    }
}
