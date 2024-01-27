<?php

namespace App\Models\Admin;

use App\Models\DB;

class Accounts extends DB
{
    public function loginAdmin($account, $pass)
    {
        $sql = "SELECT * FROM user WHERE account='$account' AND pass='$pass' AND role = 1 ";
        return $this->pdo_query_one($sql);
    }
}
