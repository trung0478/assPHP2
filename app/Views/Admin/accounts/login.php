
        <div class="box d-flex justify-content-center align-items-center mt-lg-5 mt-5">
            <div class="login px-lg-5 px-3 py-lg-5 py-4 ">
                <h5 class="fs-3 text-center">Đăng nhập quản trị</h5>
                <form id="myForm" action="<?=BASE_URL."loginAdmin"?>" method="post" >
                    <label class="mb-1 fs-6" >Tên đăng nhập</label> <br>
                    <input class="form-control" name="account" type="text" placeholder="Nhập tên đăng nhập"><br>
    
                    <label class="mb-1 fs-6">Mật khẩu</label> <br>
                    <input class="form-control" name="pass" type="password" placeholder="Nhập mật khẩu"> <br>

                    <?php
                    if (isset($messageLogin)) {
                        echo "<p class='text-danger'>$messageLogin</p>";
                    } 
                    if (isset($invalidLogin)) {
                        echo "<p class='text-danger'>$invalidLogin</p>";
                    } 
                    ?>

                    <div class="mt-lg-3 mt-2">
                        <input class="btn btn-secondary" name="login" type="submit" value="Đăng nhập">
                    </div>
                </form>
            </div>
        </div>