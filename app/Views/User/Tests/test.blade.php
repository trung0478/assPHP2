@extends('layout.user')
@section('content')
<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <div class="box_test-time text-center">
                <p id="time" class="fs-4">Thời gian còn lại: 9 phút 30 giây</p>
            </div>
            <div class="box_test-title">
                <h5 class="fs-5"><?php echo $quiz_['title'] ?></h5>
            </div>
            <form id="myForm1" action="<?=BASE_URL."submit"?>" method="post">
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
                        $answers = $QuizzesModels->getAllAnswers($id_question);
                        $answerCorrect = $QuizzesModels->getAnswersCorrect($id_question); // lấy ra 1 id của câu trả lời đúng
                        foreach ($answers as $value) :
                            extract($value)
                        ?>
                            <div class="answer-item d-flex align-content-center">
                                <input type="hidden" name="idAnswer" value="<?= $id_answer ?>">
                                <!-- truyền vào id_ques và lấy value là id_ans -->
                                <input type="hidden" name="idAnswerCorrect[<?= $answerCorrect['id_question'] ?>]" value="<?= $answerCorrect['id_answer'] ?>">
                                <input type="hidden" name="idQuestion[<?= $id_question ?>]" value="<?= $id_question ?>">

                                <!-- lấy ra id câu trả lời được chon theo câu hỏi-->
                                <!-- answer[<$id_question ?>] : để cho radio được chọn một lần nhưng value vẫn là id_answer-->
                                <input type="radio" class="validate" name="answer[<?= $id_question ?>]" value="<?= $id_answer ?>">
                                <span class="fs-6 mx-lg-2 mx-1"><?= $answer ?></span>
                            </div>
                        <?php endforeach; ?>
                        <span class="error-message"></span>
                    </div>
                <?php endforeach; ?>
                <div class="box_test-action pt-lg-3 pt-2 ">
                    <a href="<?=BASE_URL?>" class="test-action-next btn btn-secondary">Quay lại</a>
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

    // var form = document.getElementById('myForm');
    // form.addEventListener('submit', function (event) {
    //     var answerItem = document.querySelectorAll('.answer-item');

    //     for (var i = 0; i < answerItem.length; i++) {
    //         var radioButtons = answerItem[i].querySelectorAll('input[type=radio]');
    //         var selectedCount = 0;

    //         for (var j = 0; j < radioButtons.length; j++) {
    //             if (radioButtons[j].checked) {
    //                 selectedCount++;
    //             }
    //         }

    //         if (selectedCount !== 1) {
    //             alert('Vui lòng chọn đúng một đáp án cho mỗi câu hỏi.');
    //             event.preventDefault(); // Ngăn chặn form được submit
    //             return; // Dừng xử lý nếu có ít hơn hoặc nhiều hơn một đáp án được chọn
    //         }
    //     }
    // });
</script>
@endsection