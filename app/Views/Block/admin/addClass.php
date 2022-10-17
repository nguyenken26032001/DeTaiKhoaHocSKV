<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">THÊM LỚP</h2>
            <!-- <a href="<?php echo _WEB_ROOT_ ?>/Admin/addClass" class="link_file">Thêm lớp</a> -->
        </div>
        <form action="<?PHP echo _WEB_ROOT_ ?>/Admin/addClass" method="post">
            <div class="row mt-5 mb-5 text-center d-flex justify-content-center">
                <div class="md-col-3 mr-4">
                    <label for="">Mã Lớp</label>
                    <input type="text" class="form-control" name="maLop" required>
                </div>
                <div class="md-col-3 mr-4">
                    <label for="department">Khoa</label>
                    <select class="form-control" name="maKhoa" id="0" onchange="changeDataTable(this.value)">
                        <?php
                        foreach ($dataKhoa as $item) {
                            echo $item['makhoa'];
                            echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="md-col-3 mr-4">
                    <label for="pwd">Hệ Đào Tạo</label>
                    <select class="form-control" name="heDaoTao" id="heDaoTao"
                        onchange="updateLop(this.value,$('#0').val())">
                        <option value="Đại học chính quy">Đại học chính quy</option>
                        <option value="Cao đẳng chính quy">Cao đẳng chính quy</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Niên khóa</label>
                    <input type="text" name="nienKhoa" id="" class="form-control" required>
                </div>
            </div>
            <div class="button_feature d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4 py-2" style="margin-left: 120px;" name="addClass">
                    THÊM</button>
        </form>
        <form action="<?php echo _WEB_ROOT_ ?>/import/importData" method="post" enctype="multipart/form-data">
            <div class="import" style="margin-right:50px">
                <input type="file" name="file_import" required style="width: 250px;">
                <button class="btn btn-success px-3" name="import">IMPORT</button>
                <a href="<?php echo _WEB_ROOT_ ?>/Uploads/template_fileImportClass.xlsx" class="btn btn-success"> down
                    load file mẫu</a>
            </div>
        </form>
    </div>
</div>
</div>