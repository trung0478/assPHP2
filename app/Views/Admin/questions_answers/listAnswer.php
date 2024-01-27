<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <div class="row my-lg-2 my-1">
                <h3 class="col-6 fs-3 mb-lg-3 mb-3 heading_">Câu trả lời </h3>
                <div class="d-flex justify-content-end align-items-center col-6">
                    <a href="<?=BASE_URL."test"?>" class="btn btn-success">Quay lại</a>
                </div>
            </div>
            
            <?php
            foreach ($answers as $key => $value) :
                extract($value);
            ?>
                <div class="row my-lg-2 my-1 align-items-center">
                    <div class="col-12 fs-3 mb-lg-3 mb-3 ">
                        <span><?= $key + 1 ?>.</span>
                        <span>
                            <?= $answer ?>
                            <?php echo ($is_correct==1)?"<span><i class='fa-solid fa-check text-success'></i></span>":"";?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>