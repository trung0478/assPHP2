</div>
</div>
<footer>
    <!-- <p class="fs-5 text-center my-0 py-lg-2 py-1">Dang Quoc Trung - Ph44412</p> -->
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8e3c294816.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                account: "required",
                email: {
                    required: true,
                    email: true
                },
                'answer[]':{
                    required: true,
                },
                pass: {
                    required: true,
                    minlength: 5,
                    checkPassword: true
                },
                test: "required",
                answer:"required"
            },
            
            messages: {
                account: "Vui lòng nhập tên đăng nhập.",
                email: {
                    required:"Vui lòng nhâp email.",
                    email: "Vui lòng nhập đúng định dạnh email."
                },
                'answer[]':{
                    required: "vui long chon",
                },
                pass: {
                    required: "Vui lòng nhập mật khẩu mới",
                    minlength: "Vui lòng nhập tối thiểu 5 kí tự",
                    checkPassword: "Mật khẩu phải chứa ít nhất 1 chữ cái và 1 số"
                },
                test: "Vui long",
                answer:"Vui long"
            },
        });

        // validate câu trả lời cho mỗi câu hỏi phải chọn 1 đáp án
        $('#myForm1').submit(function (event) { 
            var isValid = true;

            $('.box_test-answer').each(function () { // box_test-answer đang là một mảng
                // this ở context này là mỗi box_test-answer item con
                var questionId = $(this).find('input[type=radio]').attr('name');
                if ($('input[name="' + questionId + '"]:checked').length === 0) {
                    isValid = false;
                    $(this).find('.error-message').text('Vui lòng chọn ít nhất một đáp án cho câu hỏi này.');
                } else {
                    $(this).find('.error-message').text('');
                }
            });

            if (!isValid) {
                event.preventDefault();
            }
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