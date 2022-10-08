<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">DANH SÁCH LỚP</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/addClassPage" class="link_file btn btn-outline-info">Thêm lớp</a>
            <div id="notifi">
            </div>
        </div>
        <div class="row mt-5 mb-5 text-center">
            <div class="md-col-5 mr-5" style="margin-left:330px ;">
                <label for="department">Khoa</label>
                <select class="form-control" name="khoa" id="0" onchange="changeDataTable(this.value)">
                    <option>--- Chọn khoa----</option>
                    <?php
                    foreach ($dataKhoa as $item) {
                        if (isset($maKhoa_added) && $maKhoa_added == $item['maKhoa']) {
                            echo '<option value="' . $item['maKhoa'] . '" selected>' . $item['tenKhoa'] . '</option>';
                        } else {
                            echo '<option value="' . $item['maKhoa'] . '" >' . $item['tenKhoa'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="md-col-5 ">
                <label for="pwd">Hệ Đào Tạo</label>
                <select class="form-control" name="heDaoTao" id="heDaoTao" onchange="updateLop(this.value,$('#0').val())">
                    <option>--- Chọn hệ đào tạo----</option>
                    <option value="Đại học chính quy">Đại học chính quy</option>
                    <option value="Cao đẳng chính quy">Cao đẳng chính quy</option>
                </select>
            </div>
        </div>
        <div class="row col-md-5 m-auto scrollTable">
            <table class="table table-hover table-fixed text-center">
                <thead>
                    <tr>
                        <th scope="col">TT</th>
                        <th scope="col">Tên Lớp</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody id="dataTable">
                    <?php if (isset($dataClassByDepartment)) {
                        $index = 0;
                        foreach ($dataClassByDepartment as $item) {
                            echo
                            ' <tr>
                            <td>' . (++$index) . '</td>
                            <td>' . $item['maLop'] . '</td>
                            <td> <button class="btn btn-danger"  onclick="deleteClass(\'' . $item['maLop'] . '\')"> Delete</button></td>
                         </tr>';
                        }
                    } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>