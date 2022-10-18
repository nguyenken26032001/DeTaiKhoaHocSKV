<div class="content-wrapper">
    <div class="header-thongke d-flex justify-content-center align-items-center"
        style="background-color: #624bff; height:100px">
        <h3 class="text-light ">Thống kê chi tiết</h3>
    </div>

    <div class="form-group d-flex mt-4 " style="padding-left:150px;">
        <select name="" id="option" class="form-control " style="max-width: 250px;"
            onchange="DuLieuThongKe(this.value)">
            <option value="" disabled selected>-- chọn tiêu chí ---</option>
            <option value="khoa">Thống kê theo khoa</option>
            <option value="year">Thống kê theo năm</option>
            <option value="Type">Thống kê theo loại</option>
        </select>
        <select name="year" id="StatisticalByYear" class="form-control ml-5" style="max-width: 250px;"
            onchange="Statistical_by_year(this.value,$('#option').val())">
            <option value="null" selected>-- chọn năm ---</option>
            <?php
            foreach ($listyear as $item) {
                echo "<option value=" . $item . " >" . $item . "</option>";
            }
            ?>
        </select>
        <select name="Type" id="StatisticalByType" class="form-control ml-5" style="max-width: 250px;"
            onchange="Statistical_by_Type(this.value,$('#option').val())">
            <option value="null" selected>-- chọn loại đề tài --</option>
            <?php
            $array = ['Xuất sắc', 'Tốt', 'Khá', 'Đạt', 'Không đạt'];
            foreach ($array as $item) {
                echo "<option value=" . $item . ">" . $item . "</option>";
            }
            ?>
        </select>
        <select name="Deparment" id="StatisticalByDeparment" class="form-control ml-5" style="max-width: 250px;"
            onchange="Statistical_by_Deparment(this.value,$('#option').val())">
            <option value="null" selected>-- chọn Khoa ---</option>
            <?php
            foreach ($dataDepartments as $item) {
                echo "<option value=" . $item['maKhoa'] . " >" . $item['tenKhoa'] . "</option>";
            }
            ?>


        </select>
    </div>
    <div class="wraper_table px-3" id="tableThongKe">
    </div>
</div>