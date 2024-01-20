<!-- test -->
<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <div class="box_test-time text-center">
                <p class="fs-4">Thời gian còn lại: 9 phút 30 giây</p>
            </div>
            <div class="box_test-title">
                <h5 class="fs-5"><?php echo $quiz_['title'] ?></h5>
            </div>
            <form id="myForm" action="?act=submit" method="post">
                <label for="">1234567</label>
                <input type="text" name="test">
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
                        $answerCorrect=getAnswersCorrect($id_question);
                        foreach ($answers as $value) :
                            extract($value)
                        ?>
                            <div class="answer-item d-flex align-content-center">
                                <input type="hidden" name="idAnswer" value="<?= $id_answer ?>">
                                <!-- truyền vào id_ques và lấy value là id_ans -->
                                <input type="hidden" name="idAnswerCorrect[<?=$answerCorrect['id_question'] ?>]" value="<?=$answerCorrect['id_answer'] ?>">
                                <input type="hidden" name="idQuestion[<?= $id_question ?>]" value="<?= $id_question ?>">

                                <!-- lấy ra id câu trả lời được chon theo câu hỏi-->
                                <!-- answer[<$id_question ?>] : để cho ridio được chọn một lần nhưng value vẫn là id_answer-->
                                <input type="radio"  class="validate"   name="answer[<?= $id_question ?>]" value="<?= $id_answer ?>">
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
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                test:"require"
            },
            messages: {
                test:"khong "
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element); // Hiển thị thông báo lỗi dưới ô input
            }
        })
    })
</script>