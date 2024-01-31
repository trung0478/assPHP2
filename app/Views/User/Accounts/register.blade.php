@extends('layout.user')
@section('content')
<div class="box d-flex justify-content-center align-items-center">
    <div class="login px-lg-5 px-3 py-lg-5 py-4 ">
        <h5 class="fs-3 text-center">Đăng ký</h5>
        <form id="myForm" action="<?=BASE_URL."register"?>" method="post" >
            <label class="mb-1">Tên đăng nhập</label> <br>
            <input class="form-control" name="account" type="text" placeholder="Nhập tên đăng nhập"><br>

            <label class="mb-1">Email</label> <br>
            <input class="form-control" name="email" type="text" placeholder="Nhập email"><br>

            <label class="mb-1">Mật khẩu</label> <br>
            <input class="form-control" name="pass" type="password" placeholder="Nhập mật khẩu"> <br>

            <div class="d-flex justify-content-center align-items-center">
                <input class="btn btn-secondary" name="register" type="submit" value="Đăng ký">
            </div>
        </form>
    </div>
</div>
@endsection('content')

<!-- <script>
    function handleRegister() {
        // Kiểm tra điều kiện đăng ký thành công (có thể sử dụng AJAX để kiểm tra từ server)
        var registerSuccess = true; // Giả sử đăng ký thành công

        if (registerSuccess) {
            alert("Đăng ký thành công!");
            return true; // Cho phép form được submit
        }
        // } else {
        //     // Nếu đăng ký không thành công, có thể hiển thị thông báo khác hoặc thực hiện xử lý khác
        //     alert("Đăng ký không thành công. Vui lòng thử lại.");
        //     return false; // Ngăn chặn form được submit
        // }
    }
</script> -->