<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Accounts;

class AccountsControllers extends BaseController
{
    public function loginAdminInterface()
    {
       $title="Đăng nhập quản trị";
       $this->render('Admin.accounts.login',compact('title'));
    }

    public function loginAdmin()
    {
        if (isset($_POST['login'])) {
            $acc = $_POST['account'];
            $pass = $_POST['pass'];

            $accountsModels = new Accounts();
            $login = $accountsModels->loginAdmin($acc, $pass);

            if (is_array($login)) {
                if ($login['role'] == 1) {
                    $_SESSION['accountAdmin'] = $login['role'];
                    $_SESSION['account'] = $login;
                    $_SESSION['id_account'] = $login['id_user'];
                    $_SESSION['role'] = $login['role'];
                    header("Location:" . BASE_URL . "admin");
                }
            } else {
                $invalidLogin = "Sai tài khoản hoặc mật khẩu";
                $title="Đăng nhập quản trị";
                $this->render('Admin.accounts.login',compact('invalidLogin','title'));
            }
        }
    }

    public function logoutAdmin() {
        session_unset();
        header('Location:'.BASE_URL."loginInterface");
    }
}
