@extends('layout.admin')
@section('content')
<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <h3 class="fs-3 mb-lg-3 mb-3 heading_">Sửa câu hỏi và câu trả lời</h3>
            <form id="myForm" action="<?= BASE_URL . "updateQuesAns_" . $question['id_question'] ?>" method="post" enctype="multipart/form-data">
                <label for="">Câu hỏi</label> <br>

                <input type="text" name="question" class="form-control" placeholder="Nhập câu hỏi" value="<?= $question['question'] ?>"><br>

                <div class="box-answer px-3 my-lg-2 my-1">

                    <?php
                    foreach ($answers as $key => $value) :
                        extract($value);
                    ?>
                        <label for="">Câu trả lời <?= $key + 1 ?></label> <br>
                        <input type="hidden" name="idAns[]" value="<?= $id_answer ?>">
                        <input type="text" name="answer[]" class="form-control" placeholder="Nhập câu trả lời <?= $key + 1 ?>" value="<?= $answer ?>"><br>
                    <?php endforeach; ?>

                    <label for="">Chọn câu trả lời đúng</label> <br>
                    <select class="form-control" name="answerCorrect" id="">

                        <?php
                        foreach ($answers as $key => $value) :
                            extract($value);
                        ?>
                            <option <?php echo ($is_correct == 1) ? "selected" : ""; ?> value="<?= $key ?>">Câu trả lời <?= $key + 1 ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <input type="submit" name="submit" value="Sửa" class="btn btn-success my-lg-2 my-1">
            </form>
        </div>
    </div>
</div>
@endsection('content')
