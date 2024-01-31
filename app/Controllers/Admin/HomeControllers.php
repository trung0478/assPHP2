<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HomeControllers extends BaseController {
    public function home() {
        $title="Trang chủ Admin";
        $this->render('Admin._home',compact('title'));
    }
}

?>