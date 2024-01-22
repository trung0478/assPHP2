<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <div class="row my-lg-2 my-1">
                <h3 class="col-6 fs-3 mb-lg-3 mb-3 heading_">Câu hỏi</h3>
                <div class="d-flex justify-content-end align-items-center col-6">
                    <a href="?act=addQuesAns" class="btn btn-success">Thêm mới</a>
                </div>
            </div>

            <?php
            foreach ($questions as $key => $value) :
                extract($value);
            ?>
                <div class="row my-lg-2 my-1 align-items-center">
                    <div class="col-9 fs-3 mb-lg-3 mb-3 ">
                        <span><?= $key + 1 ?>.</span>
                        <span><?= $question ?></span>
                    </div>
                    <div class="col-3">
                        <a href="?act=updateQuesAns&idQues=<?= $id_question ?>" class="btn btn-warning mb-lg-0 mb-1">Sửa</a>
                        <a href="?act=listAnswers&idQues=<?= $id_question ?>" class="btn btn-secondary ">Xem chi tiết</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>