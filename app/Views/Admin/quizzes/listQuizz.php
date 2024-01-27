
            <div class="row mt-lg-4 mt-2">
                <div class="col-12 d-flex justify-content-center">
                    <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
                        <div class="row my-lg-2 my-1">
                            <h3 class="col-6 fs-3 mb-lg-3 mb-3 heading_">Bài kiểm tra</h3>
                            <div class="d-flex justify-content-end align-items-center col-6">
                                <a href="<?php echo BASE_URL . 'addTestInterface'; ?>" class="btn btn-success">Thêm mới</a>
                            </div>
                        </div>
                        <table class="table text-center">
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            <tbody>
                                <?php
                                foreach ($listQuiz  as $value) :
                                    extract($value);
                                ?>
                                    <tr>
                                        <td><?= $id_quiz ?></td>
                                        <td><?= $title ?></td>
                                        <td>
                                            <img width="50px" height="40px" src="<?=$image ?>" alt="">
                                        </td>
                                        <td><?= $created_at ?></td>
                                        <td>
                                            <a href="<?php echo BASE_URL . 'updateTestInterface?idQuiz='.$id_quiz ?>" class="btn btn-warning">Sửa</a>
                                            <a onclick="return confirm('Bạn có muốn xoá không ??')" href="<?php echo BASE_URL . 'deleteTest?idQuiz='.$id_quiz ?>" class="btn btn-danger">Xoá</a>
                                            <a href="<?php echo BASE_URL . 'listQuestion?idQuiz='.$id_quiz ?>" class="btn btn-success">Xem chi tiết</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        