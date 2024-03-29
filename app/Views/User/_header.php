<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="app/Css/User/style.css">
</head>

<style>
    span.error-message,
    label.error {
        color: red;
    }
</style>

<body>
    <div class="app">
        <div class="container">
            <!-- header -->
            <nav class="navbar navbar-expand-lg " style="background-color: #ffffff;">
                <div class="container-fluid">

                    <img class="navbar-brand" src="app/Public/logo.png" width="8%" alt="">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= BASE_URL ?>">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">GIỚI THIỆU</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    BÀI KIỂM TRA
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach ($quizzes as $key => $value) :
                                        extract($value);
                                    ?>
                                        <li><a class="dropdown-item" href="<?= BASE_URL . "quiz_" . $id_quiz ?>"><?= $title ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">HỎI ĐÁP</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    TÀI KHOẢN
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (isset($_SESSION['account']) && $_SESSION['account'] != "") {
                                        if ($_SESSION['role'] == 1) {
                                    ?>
                                            <li><a class="dropdown-item" href="<?= BASE_URL . "admin" ?>">QUẢN TRỊ</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL . "testHistory" ?>">LỊCH SỬ KIỂM TRA</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL . "logout" ?>">ĐĂNG XUẤT</a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li><a class="dropdown-item" href="<?= BASE_URL . "testHistory" ?>">LỊCH SỬ KIỂM TRA</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL . "logout" ?>">ĐĂNG XUẤT</a></li>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <li><a class="dropdown-item" href="<?= BASE_URL . "registerInterface" ?>">ĐĂNG KÝ</a></li>
                                        <li><a class="dropdown-item" href="<?= BASE_URL . "loginInterface" ?>">ĐĂNG NHẬP</a></li>
                                    <?php
                                    }
                                    ?>
                                    <!-- <li>
                                        <hr class="dropdown-divider">
                                    </li> -->
                                    <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm " aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
            </nav>