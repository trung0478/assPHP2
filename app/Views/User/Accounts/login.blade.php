@extends('layout.user')
@section('content')
<div class="box d-flex justify-content-center align-items-center">
    <div class="login px-lg-5 px-3 py-lg-5 py-4 ">
        <h5 class="fs-3 text-center">Đăng nhập</h5>
        <form id="myForm" action="<?= BASE_URL . "login" ?>" method="post">
            <label class="mb-1">Tên đăng nhập</label> <br>
            <input class="form-control" name="account" type="text" placeholder="Nhập tên đăng nhập"><br>

            <label class="mb-1">Mật khẩu</label> <br>
            <input class="form-control" name="pass" type="password" placeholder="Nhập mật khẩu"> <br>

            <a href="<?= BASE_URL . "forgetPassInterface" ?>">Quên mật khẩu ?</a>

            <?php
            if (isset($messageLogin)) {
                echo "<p class='text-danger'>$messageLogin</p>";
            }
            if (isset($invalidLogin)) {
                echo "<p class='text-danger'>$invalidLogin</p>";
            }
            ?>
            <div class="mt-lg-3 mt-2">
                <a class="btn btn-secondary" href="<?= BASE_URL . "registerInterface" ?>">Đăng ký</a>
                <input class="btn btn-secondary" name="login" type="submit" value="Đăng nhập">
            </div>
        </form>
    </div>
</div>
@endsection('content')