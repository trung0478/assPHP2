<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test text-center w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <h3 class="fs-3">Bài kiểm tra</h3>
            <table class="table">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
                <tbody>
                    <?php
                    foreach ($quizzes as $value):
                        extract($value);
                    ?>
                    <tr>
                        <td><?=$id_quiz?></td>
                        <td><?=$title?></td>
                        <td>
                            <img width="50px" src="../../Public/<?=$image?>" alt="">
                        </td>
                        <td><?=$created_at?></td>
                        <td>
                            <a href="#" class="btn btn-warning">Sửa</a>
                            <a href="#" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>