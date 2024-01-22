
<!-- main -->
<div class="heading_1 mt-lg-4 mt-2">
    <h4 class="fs-4">Bài kiểm tra phổ biến</h4>
</div>

<div class="row justify-content-center mt-lg-4 mt-2">
    <?php
    foreach ($quizzes as $value) :
        extract($value);
    ?>
    <div class="box-test col-lg-4 col-6 mb-lg-4 mb-2 px-0">
        <div class="box-test_item mx-3" style="background-color: #ffffff;">
            <div class="item_img text-center px-lg-5 px-3 py-lg-4 py-2">
                <img width="80%" src="<?=$link_img.$image ?>" alt="">
            </div>
            <div class="item_title text-center py-lg-2 py-1">
                <a href="?act=test&idquiz=<?=$id_quiz?>" class="mb-0 fs-4 text-decoration-none"><?=$title?></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
