<?php

namespace App\Controllers\User;

use App\Models\User\Accounts;

class AccountsControllers
{
    public function loginInterface()
    {
        include 'app/Views/User/_header.php';
        include 'app/Views/User/Accounts/login.php';
        include 'app/Views/User/_footer.php';
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $acc = $_POST['account'];
            $pass = $_POST['pass'];

            $accountsModels = new Accounts();
            $login = $accountsModels->login($acc, $pass);

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
                include 'app/Views/User/_header.php';
                include 'app/Views/User/Accounts/login.php';
                include 'app/Views/User/_footer.php';
                // self::loginInterface();
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
        include 'app/Views/User/_header.php';
        include 'app/Views/User/Accounts/register.php';
        include 'app/Views/User/_footer.php';
    }

    public function register()
    {
        if (isset($_POST['register'])) {
            $accountsModels = new Accounts();
            $accountsModels->register($_POST['account'], $_POST['email'], $_POST['pass']);
        }
        header("Location:" . BASE_URL . "loginInterface");
    }

    public function forgetPassInterface()
    {
        include 'app/Views/User/_header.php';
        include 'app/Views/User/Accounts/forgetPass.php';
        include 'app/Views/User/_footer.php';
    }

    public function forgetPass()
    {
        if (isset($_POST['submit'])) {
            $accountsModels = new Accounts();
            $sendPass = $accountsModels->check_email($_POST['email']);
        }
        include 'app/Views/User/_header.php';
        include 'app/Views/User/Accounts/forgetPass.php';
        include 'app/Views/User/_footer.php';
    }
}
