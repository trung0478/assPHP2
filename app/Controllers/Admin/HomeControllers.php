<?php
namespace App\Controllers\Admin;

class HomeControllers{
    public function home() {
        include 'app/Views/Admin/_header.php';
        include 'app/Views/Admin/_home.php';
        include 'app/Views/Admin/_footer.php';
    }
}

?>