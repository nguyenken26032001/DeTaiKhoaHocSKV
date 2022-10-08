<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">THÊM ĐỀ TÀI MỚI</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/managerArticle" class="link_file btn btn-outline-info">Quản lý đề tài</a>
        </div>
        <form action="<?php echo _WEB_ROOT_ ?>/Admin/AddArticle" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="usr">Mã Đề Tài</label>
                <input required="true" type="text" class="form-control" id="usr" name="maDeTai">
            </div>
            <div class="form-group">
                <label for="email">Tên Đề Tài</label>
                <input required="true" type="text" class="form-control" name="tenDeTai">
            </div>
            <div class="form-group">
                <label for="pwd">Đơn Vị Chủ Trì</label>
                <select class="form-control" name="khoaChuTri" id="">
                    <?php
                    foreach ($dataKhoa as $item) {
                        echo $item['makhoa'];
                        echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Ngày Giao Đề Tài</label>
                <input type="date" class="form-control" id="ngayGiao" required="true" name="ngayGiao">
            </div>
            <div class="form-group">
                <label for="">Ngày Nghiệm Thu</label>
                <input type="date" class="form-control" id="ngayNghiemThu" required="true" name="ngayNghiemThu" onchange="checkdate()">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="thanhvien">
                        <label for=""> Giáo Viên Hướng Dẫn </label>
                        <input type="text" class="form-control" id="" required="true" name="GVHD">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Thuộc khoa </label>
                        <select class="form-control" name="khoaGVHD" id="">
                            <?php
                            foreach ($dataKhoa as $item) {
                                echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="usr">Chủ Nhiệm Đề Tài</label>
                <input required="true" type="text" class="form-control" id="usr" name="chuNhiemDeTai">
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pwd">Thuộc Khoa </label>
                        <select class="form-control" name="khoaChuNhiem" id="0" onchange="FetchDepartment(this.value,this)">
                            <?php
                            foreach ($dataKhoa as $item) {
                                echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pwd">Hệ Đào Tạo</label>
                        <select class="form-control" name="heCNDT" id="0" onchange="FetchDataHeDaoTao(this.value,$('#0').val(),this)">
                            <option value="Đại học chính quy">Đại học chính quy</option>
                            <option value="Cao đẳng chính quy">Cao đẳng chính quy</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 helo">
                    <div class="form-group">
                        <label for="pwd">Lớp </label>
                        <select class="form-control" name="lopCNDT" id="lop0" required>
                            <option selected disabled>----Chọn Lớp----</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label style="text-justify: center;" for="email">Khóa</label>
                        <select class="form-control" name="nienKhoaCNDT">
                            <option value="2019-2023">2019-2023</option>
                            <option value="2020-2024">2020-2024</option>
                            <option value="2021-2025">2021-2025</option>
                            <option value="2022-2026">2022-2026</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="thanhvien">
                <label for=""> Số Lượng Thành Viên </label>
                <input type="number" class="form-control" id="member" required="true" min="0" name="member" onchange="load()" value="0">
            </div>
            <!-- ----- -->
            <div id="addMember" style="background-color: #EEE;padding: 10px 20px 20px 20px;display:none;">
            </div>
            <div class="form-group">
                <label for="">Mục Tiêu Nghiên Cứu</label>
                <textarea required="true" name="mucTieuNghienCuu" class="form-control" id="" cols="30" rows="10" spellcheck="false"></textarea>
            </div>
            <div class="form-group">
                <label for="">Sản Phẩm Nghiên Cứu</label>
                <input type="text" class="form-control" id="address" required="true" name="SPNghienCuu">
            </div>
            <div class="form-group">
                <label for="">Xếp loại đề tài</label>
                <input type="text" class="form-control" id="Article_type" required="true" name="article_type">
            </div>
            <div class="form-group">
                <label for="">File Báo Cáo </label>
                <input type="file" id="address" name="fileUploads" required="true" multiple="multiple" style="margin-left: 59px;">
            </div>
            <button type="submit" class="btn btn-success" name="addDeTai" id="add" style="margin-bottom: 30px;">Thêm Đề Tài</button>
        </form>
    </div>
</div>