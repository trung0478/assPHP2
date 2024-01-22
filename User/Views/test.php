<!-- test -->
<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <div class="box_test-time text-center">
                <p id="time" class="fs-4">Thời gian còn lại: 9 phút 30 giây</p>
            </div>
            <div class="box_test-title">
                <h5 class="fs-5"><?php echo $quiz_['title'] ?></h5>
            </div>
            <form id="myForm" action="?act=submit" method="post">
                <?php
                foreach ($quiz as $key => $value) :
                    extract($value);
                ?>
                    <div class="box_test-question">
                        <p class="fs-6 my-lg-1 my-0"><span><?= $key + 1 ?>. </span> <?= $question ?> <span> ?</span> </p>
                    </div>

                    <div class="box_test-answer mb-lg-2 mb-1">
                        <input type="hidden" value="<?= $id_question ?>">
                        <input type="hidden" name="idQuiz" value="<?= $quiz_['id_quiz'] ?>">
                        <?php
                        $answers = getAllAnswers($id_question);
                        $answerCorrect = getAnswersCorrect($id_question);
                        foreach ($answers as $value) :
                            extract($value)
                        ?>
                            <div class="answer-item d-flex align-content-center">
                                <input type="hidden" name="idAnswer" value="<?= $id_answer ?>">
                                <!-- truyền vào id_ques và lấy value là id_ans -->
                                <input type="hidden" name="idAnswerCorrect[<?= $answerCorrect['id_question'] ?>]" value="<?= $answerCorrect['id_answer'] ?>">
                                <input type="hidden" name="idQuestion[<?= $id_question ?>]" value="<?= $id_question ?>">

                                <!-- lấy ra id câu trả lời được chon theo câu hỏi-->
                                <!-- answer[<$id_question ?>] : để cho ridio được chọn một lần nhưng value vẫn là id_answer-->
                                <input type="radio" class="validate" name="answer[<?= $id_question ?>]" value="<?= $id_answer ?>">
                                <span class="fs-6 mx-lg-2 mx-1"><?= $answer ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <div class="box_test-action pt-lg-3 pt-2 ">
                    <a href="?act=home" class="test-action-next btn btn-secondary">Quay lại</a>
                    <input class="btn btn-success" name="submit" type="submit" value="Kết thúc">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let startTime = 6 * 60 + 30; // 6 phut 30 giay

    function countDownTime() {
        let minutes = Math.floor(startTime / 60);
        let seconds = startTime % 60;

        document.getElementById('time').innerText = `Thời gian còn lại: ${minutes} phút ${seconds} giây`

        if (startTime <= 0) {
            document.getElementById('myForm').style.display = 'none';
            alert('Bạn đã hết thời gian làm bài kiểm tra !!!');
        } else {
            startTime--
            // chạy khi thời gian lớn hơn không và lại gọi hàm countDownTime sau 1 giây
            setTimeout(countDownTime, 1000)
        }
    }
    countDownTime();


    // document.getElementById('myForm').addEventListener('submit', function (event) {
    //     // Lấy tất cả các input radio có class là 'validate'
    //     var radioInputs = document.querySelectorAll('.validate');

    //     // Mảng để theo dõi xem có ít nhất một câu trả lời được chọn cho mỗi câu hỏi hay không
    //     var answeredQuestions = {};

    //     // Lặp qua tất cả các input radio
    //     radioInputs.forEach(function (radio) {
    //         if (radio.checked) {
    //             // Lấy id câu hỏi từ tên radio
    //             var questionId = radio.name.split('[')[1].split(']')[0];

    //             // Đánh dấu rằng đã có câu trả lời cho câu hỏi này
    //             answeredQuestions[questionId] = true;
    //         }
    //     });

    //     // Kiểm tra xem đã chọn ít nhất một câu trả lời cho mỗi câu hỏi hay không
    //     var allQuestionsAnswered = Object.values(answeredQuestions).every(Boolean);

    //     // Nếu không chọn đầy đủ câu trả lời, ngăn chặn form submit và hiển thị thông báo
    //     if (!allQuestionsAnswered) {
    //         alert('Bạn phải chọn ít nhất một câu trả lời cho mỗi câu hỏi.');
    //         event.preventDefault(); // Ngăn chặn form submit
    //     }
    // });
</script>