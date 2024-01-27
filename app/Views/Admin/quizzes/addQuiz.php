<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <h3 class="fs-3 mb-lg-3 mb-3 heading_">Thêm bài kiểm tra</h3>
            <form id="myForm" action="<?=BASE_URL.'addTest'?>" method="post" enctype="multipart/form-data">
                <label for="">Tên bài kiểm tra</label> <br>
                <input type="text" name="title" class="form-control" placeholder="Nhập tên bài kiểm tra"><br>

                <label for="">Ảnh</label> <br>
                <input type="file" name="image" class="form-control" ><br>

                <input type="submit" name="submit" value="Thêm mới" class="btn btn-success">
            </form>
        </div>
    </div>
</div>