<div class="box d-flex justify-content-center align-items-center">
    <div class="login px-lg-5 px-3 py-lg-5 py-4 ">
        <h5 class="fs-3 text-center">Lấy lại mật khẩu</h5>
        <form action="?act=forgetPass" method="post">
            <label class="mb-1">Email</label> <br>
            <input class="form-control" name="email" type="text" placeholder="Nhập email"><br>

            <?php
            if (isset($sendPass)) {
               echo $sendPass;
            }
            ?>

            <div class="d-flex justify-content-center align-items-center">
                <input class="btn btn-secondary" name="submit" type="submit" value="Gửi mail">
            </div>
        </form>
    </div>
</div>