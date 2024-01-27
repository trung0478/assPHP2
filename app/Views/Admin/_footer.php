</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8e3c294816.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                title: "required",
                image: "required",
                question: "required",
                'answer[]': "required",
            },
            messages: {
                title: "Vui lòng nhập tên bài kiểm tra.",
                image: "Vui lòng chọn ảnh tải lên.",
                question: "Vui lòng nhập câu hỏi.",
                'answer[]': "Vui lòng nhập",
            },
           

        });

        $("#myForm_").validate({
            rules: {
                title: "required",
            },

            messages: {
                title: "Vui lòng nhập tên bài kiểm tra",
            },
        });


        // Thêm phương thức kiểm tra tùy chỉnh của checkPassword
        $.validator.addMethod("checkPassword", function(value) {
            // Kiểm tra xem mật khẩu có ít nhất 1 chữ cái và 1 số không
            return /^(?=.*[A-Za-z])(?=.*\d).+$/.test(value);
        });
    });
</script>

</body>

</html>