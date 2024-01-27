<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Accounts;

class AccountsControllers
{
    public function loginAdminInterface()
    {
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/accounts/login.php';
        include 'app/Views/Admin/_footer.php';
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
                include 'app/Views/Admin/_header.php';
                include 'app/Views/Admin/accounts/login.php';
                include 'app/Views/Admin/_footer.php';
            }
        }
    }
}
