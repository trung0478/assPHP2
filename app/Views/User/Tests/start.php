<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test text-center w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <h3 class="fs-3"><?= $quiz_['title'] ?></h3>

            <form action="<?=BASE_URL."start"?>" method="post">
                <input type="hidden" name="idquiz" value="<?= $quiz_['id_quiz'] ?>">
                <input onclick="return confirm('Bạn có muốn bắt đầu kiểm tra không ??')" class="btn btn-success" type="submit" name="start" value="Bắt đầu kiểm tra">
            </form>
        </div>
    </div>
</div>