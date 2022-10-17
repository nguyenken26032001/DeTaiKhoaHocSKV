<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">THÔNG TIN CHI TIẾT ĐỀ TÀI</h2>
            <button class="btn btn-danger delete"
                onclick="deleteArticle('<?php echo $dataArticleDetail[0]['maDeTai']; ?>')">Xóa đề tài</button>
        </div>
        <form action="<?php echo _WEB_ROOT_ ?>/Admin/UpdateArticle" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="usr">Mã Đề Tài</label>
                <input required="true" readonly type="text" class="form-control" id="usr" name="maDeTai"
                    value="<?php echo $dataArticleDetail[0]['maDeTai']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Tên Đề Tài</label>
                <input required="true" type="text" class="form-control" name="tenDeTai"
                    value="<?php echo $dataArticleDetail[0]['tenDeTai']; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Đơn Vị Chủ Trì</label>
                <select class="form-control" name="khoaChuTri" id="">
                    <option disabled>--- Chọn đơn vị chủ trì----</option>
                    <?php
                    foreach ($dataKhoa as $item) {
                        if ($item['maKhoa'] == $dataArticleDetail[0]['khoaChuTri']) {
                            echo '<option value="' . $item['maKhoa'] . '" selected>' . $item['tenKhoa'] . '</option>';
                        } else
                            echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Ngày Giao Đề Tài</label>
                <input type="date" class="form-control" id="ngayGiao" required="true" name="ngayGiao"
                    value="<?php echo $dataArticleDetail[0]['thoiGianGiao']; ?>">
            </div>
            <div class="form-group">
                <label for="">Ngày Nghiệm Thu</label>
                <input type="date" class="form-control" id="ngayNghiemThu" required="true" name="ngayNghiemThu"
                    onchange="checkdate()" value="<?php echo $dataArticleDetail[0]['thoiGianNghiemThu']; ?>">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="thanhvien">
                        <label for=""> Giáo Viên Hướng Dẫn </label>
                        <input type="text" class="form-control" id="" required="true" name="GVHD"
                            value="<?php echo $dataArticleDetail[0]['hotenGVHD']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Thuộc khoa </label>
                        <select class="form-control" name="khoaGVHD" id="">
                            <option disabled>--- Chọn khoa----</option>
                            <?php
                            foreach ($dataKhoa as $item) {
                                if ($item['maKhoa'] == $dataArticleDetail[0]['khoaGVHD']) {
                                    echo '<option value="' . $item['maKhoa'] . '" selected>' . $item['tenKhoa'] . '</option>';
                                }
                                echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="usr">Chủ Nhiệm Đề Tài</label>
                <input required="true" type="text" class="form-control" id="usr" name="chuNhiemDeTai"
                    value="<?php echo $dataArticleDetail[0]['hotenCNDT'] ?>">
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pwd">Thuộc Khoa </label>
                        <select class="form-control" name="khoaChuNhiem" id="0"
                            onchange="FetchDepartment(this.value,this)">
                            <option>----Chọn khoa----</option>
                            <?php

                            foreach ($dataKhoa as $item) {
                                if ($item['maKhoa'] == $dataArticleDetail[0]['khoaCNDT']) {
                                    echo '<option value="' . $item['maKhoa'] . '" selected>' . $item['tenKhoa'] . '</option>';
                                } else
                                    echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pwd">Hệ Đào Tạo</label>
                        <select class="form-control" name="heCNDT" id="he"
                            onchange="FetchDataHeDaoTao(this.value,$('#0').val(),this)">
                            <option>----Chọn hệ đào tạo----</option>
                            <?php
                            $lop = $dataArticleDetail[0]['lop'];
                            if (str_starts_with($lop, 'DH')) {
                                echo '<option value="Đại học chính quy" selected>Đại học chính quy</option>';
                                echo '<option value="Cao đẳng chính quy">Cao đẳng chính quy</option>';
                            } else 
                               if (str_starts_with($lop, 'CD')) {
                                echo '<option value="Đại học chính quy">Đại học chính quy</option>';
                                echo '<option value="Cao đẳng chính quy" selected>Cao đẳng chính quy</option>';
                            } else {
                                echo '<option value="Đại học chính quy">Đại học chính quy</option>';
                                echo '<option value="Cao đẳng chính quy">Cao đẳng chính quy</option>';
                            }

                            ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-3 helo">
                    <div class="form-group">
                        <label for="pwd">Lớp</label>
                        <select class="form-control" name="lopCNDT" id="lop0">
                            <option>----Chọn Lớp----</option>
                            <?php
                            foreach ($dataClass as $item) {
                                if ($item['maLop'] == $dataArticleDetail[0]['lop']) {
                                    echo '<option value="' . $item['maLop'] . '" selected>' . $item['maLop'] . '</option>';
                                } else
                                    echo '<option value="' . $item['maLop'] . '">' . $item['maLop'] . '</option>';
                            }
                            ?>
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
            <input type="hidden" name="member" value="<?php echo  $Numbermember[0]['numberMember'] - 1 ?>">
            <?php
            $numberMB = $Numbermember[0]['numberMember'] - 1;
            if ($numberMB > 0) {
                for ($i = 1; $i <= $numberMB; $i++) {
            ?>
            <label for=""> Thành Viên</label>
            <div class="row  p-2 border border-secondary">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""> Họ Tên</label>
                        <input type="text" spellcheck="false" name="name_MB<?php echo $i ?>" class="form-control"
                            required id="" value="<?php echo $member[$i - 1]['hoTen'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""> Khoa</label>
                        <select name="khoa_MB<?php echo $i ?>" id="<?php echo $i ?>" class="form-control"
                            onchange="FetchDepartment(this.value,this)">
                            <?php
                                    foreach ($dataKhoa as $item) {
                                        if ($item['maKhoa'] == $member[$i - 1]['maKhoa']) {
                                            echo '<option value="' . $item['maKhoa'] . '" selected>' . $item['tenKhoa'] . '</option>';
                                        } else
                                            echo '<option value="' . $item['maKhoa'] . '">' . $item['tenKhoa'] . '</option>';
                                    }
                                    ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for=""> Hệ Đào Tạo</label>
                        <select name="he_MB<?php echo $i ?>" id="<?php echo $i ?>" class="form-control"
                            onchange="FetchDataHeDaoTao(this.value,$('#<?php echo $i ?>').val(),this)">
                            <option value="Đại học chính quy">Đại học chính quy</option>
                            <option value="Cao đẳng chính quy">Cao đẳng chính quy</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for=""> Lớp</label>
                        <select name="lop_MB<?php echo $i ?>" id="lop<?php echo $i ?>" class="form-control">
                            <?php
                                    foreach ($dataClassMember[$i - 1] as $item) {
                                        if ($item['maLop'] == $member[$i - 1]['lop']) {
                                            echo '<option value="' . $item['maLop'] . '" selected>' . $item['maLop'] . '</option>';
                                        } else
                                            echo '<option value="' . $item['maLop'] . '">' . $item['maLop'] . '</option>';
                                    }
                                    ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for=""> Niên khóa</label>
                        <select class="form-control" name="nienKhoa_MB<?php echo $i ?>">
                            <option value="2019-2023">2019-2023</option>
                            <option value="2020-2024">2020-2024</option>
                            <option value="2021-2025">2021-2025</option>
                            <option value="2022-2026">2022-2026</option>
                        </select>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <div class="form-group">
                <label for="">Mục Tiêu Nghiên Cứu</label>
                <textarea required="true" name="mucTieuNghienCuu" class="form-control" id="" cols="30" rows="5"
                    spellcheck="false"> <?php echo $dataArticleDetail[0]['mucTieuNghienCuu'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Sản Phẩm Nghiên Cứu</label>
                <input type="text" class="form-control" id="address" required="true" name="SPNghienCuu"
                    value="<?php echo $dataArticleDetail[0]['sanPhamNghienCuu']; ?>">
            </div>
            <div class="form-group">
                <label for="">Xếp loại đề tài</label>
                <input type="text" class="form-control" id="Article_type" required="true" name="article_type"
                    value="<?php echo $dataArticleDetail[0]['xepLoai']; ?>">
            </div>
            <div class="form-group">
                <label for="">File Báo Cáo </label>
                <input type="file" id="address" name="fileUploads" style="margin-left: 59px;"> <span>
                    <?php echo $dataArticleDetail[0]['fileBaoCao'] ?></span>
            </div>
            <input type="hidden" name="file_Old" value="<?php echo $dataArticleDetail[0]['fileBaoCao']; ?>">
    </div>
    <button type="submit" class="btn btn-success" name="updateDeTai" id="update" style="margin-bottom: 30px;">CẬP
        NHẬT</button>
    </form>

</div>
</div>