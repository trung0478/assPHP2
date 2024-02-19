<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\Accounts;
use App\Models\User\Quizzes;

class AccountsControllers extends BaseController
{
    protected $accountsModels;

    public function __construct()
    {
        return $this->accountsModels = new Accounts();
    }

    public function loginInterface()
    {
        // thêm cho phần thanh menu - Bài kiểm tra 
        $QuizzesModels = new Quizzes();
        $quizzes = $QuizzesModels->getAllQuizzes();

        $title = "Đăng nhập";
        $this->render('User.Accounts.login', compact('quizzes', 'title'));
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $acc = $_POST['account'];
            $pass = $_POST['pass'];

            $login = $this->accountsModels->login($acc, $pass);

            if (is_array($login)) {
                if ($login['role'] == 1) {
                    $_SESSION['accountAdmin'] = $login['role'];
                    $_SESSION['account'] = $login;
                    $_SESSION['id_account'] = $login['id_user'];
                    $_SESSION['role'] = $login['role'];
                    header("Location:" . BASE_URL);
                } else {
                    $_SESSION['account'] = $login;
                    $_SESSION['id_account'] = $login['id_user'];
                    $_SESSION['role'] = $login['role'];
                    header("Location:" . BASE_URL);
                }
            } else {
                $invalidLogin = "Sai tài khoản hoặc mật khẩu";
                $title = "Đăng nhập";
                $this->render('User.Accounts.login', compact('invalidLogin', 'title'));
            }
        }
    }

    public function logout()
    {
        session_unset();
        header("Location:" . BASE_URL);
    }

    public function registerInterface()
    {
        // thêm cho phần thanh menu - Bài kiểm tra 
        $QuizzesModels = new Quizzes();
        $quizzes = $QuizzesModels->getAllQuizzes();

        $title = "Đăng ký";
        $this->render('User.Accounts.register', compact('quizzes','title'));
    }

    public function register()
    {
        if (isset($_POST['register'])) {
            $this->accountsModels->register($_POST['account'], $_POST['email'], $_POST['pass']);
        }
        header("Location:" . BASE_URL . "loginInterface");
    }

    public function forgetPassInterface()
    {
        // thêm cho phần thanh menu - Bài kiểm tra 
        $QuizzesModels = new Quizzes();
        $quizzes = $QuizzesModels->getAllQuizzes();

        $title = "Quên mật khẩu";
        $this->render('User.Accounts.forgetPass', compact('quizzes', 'title'));
    }

    public function forgetPass()
    {
        if (isset($_POST['submit'])) {
            $sendPass = $this->accountsModels->check_email($_POST['email']);
        }
        $title = "Quên mật khẩu";
        $this->render('User.Accounts.forgetPass', compact('sendPass', 'title'));
    }
}
