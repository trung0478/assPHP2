<div class="row mt-lg-4 mt-2">
    <div class="col-12 d-flex justify-content-center">
        <div class="box_test w-75 px-lg-3 px-2 pt-lg-4 pt-2 pb-lg-3 pb-2">
            <h3 class="fs-3 mb-lg-3 mb-3 heading_">Thêm câu hỏi và câu trả lời</h3>
            <form action="?act=addQuesAns" method="post" enctype="multipart/form-data">
                <label for="">Câu hỏi</label> <br>
                <input type="text" name="question" class="form-control" placeholder="Nhập câu hỏi"><br>

                <div class="box-answer px-3 my-lg-2 my-1">
                    <label for="">Câu trả lời 1</label> <br>
                    <input type="text" name="answer[]" class="form-control" placeholder="Nhập câu trả lời 1"><br>

                    <label for="">Câu trả lời 2</label> <br>
                    <input type="text" name="answer[]" class="form-control" placeholder="Nhập câu trả lời 2"><br>

                    <label for="">Câu trả lời 3</label> <br>
                    <input type="text" name="answer[]" class="form-control" placeholder="Nhập câu trả lời 3"><br>

                    <label for="">Câu trả lời 4</label> <br>
                    <input type="text" name="answer[]" class="form-control" placeholder="Nhập câu trả lời 4"><br>

                    <label for="">Chọn câu trả lời đúng</label> <br>
                    <select class="form-control" name="answerCorrect" id="">
                        <option value="0">Câu trả lời 1</option>
                        <option value="1">Câu trả lời 2</option>
                        <option value="2">Câu trả lời 3</option>
                        <option value="3">Câu trả lời 4</option>
                    </select>
                </div>

                <input type="submit" name="submit" value="Thêm mới" class="btn btn-success my-lg-2 my-1">
            </form>
        </div>
    </div>
</div>