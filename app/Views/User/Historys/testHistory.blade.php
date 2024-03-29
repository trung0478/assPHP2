@extends('layout.user')
@section('content')
<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test text-center w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <h5 class="fs-3 text-center">Lịch sử kiểm tra</h5>
            <table class="table">
                <tr class="text-center">
                    <th>Bài kiểm tra </th>
                    <th>Số lần làm </th>
                    <th></th>
                </tr>
                <tbody>
                    <?php
                    foreach ($results as $value) :
                        extract($value);
                    ?>
                        <tr>
                            <td><?= $title ?></td>
                            <td>
                                <?php $quantityQuiz = $resultModels->countQuantityQuiz($id_quiz);
                                echo $quantityQuiz[0]["quantityQuiz"];
                                ?>
                            </td>
                            <td><a href="<?= BASE_URL . "detailTestHistory_" . $id_quiz ?>" class="btn btn-success">Xem thêm</a> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= BASE_URL ?>" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection