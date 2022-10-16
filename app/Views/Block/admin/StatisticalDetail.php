<div class="content-wrapper">
    <div class="header-thongke d-flex justify-content-center align-items-center" style="background-color: #624bff; height:100px">
        <h3 class="text-light ">Thống kê chi tiết</h3>
    </div>

    <div class="form-group d-flex mt-4 " style="padding-left:150px;">
        <select name="" id="option" class="form-control " style="max-width: 250px;" onchange="DuLieuThongKe(this.value)">
            <option value="" disabled selected>-- chọn tiêu chí ---</option>
            <option value="khoa">Thống kê theo khoa</option>
            <option value="year">Thống kê theo năm</option>
        </select>
        <select name="year" id="StatisticalByYear" class="form-control ml-5" style="max-width: 250px;" onchange="Statistical_by_year(this.value,$('#option').val())">
            <option value="null">-- chọn năm ---</option>
            <?php
            foreach ($listyear as $item) {
                echo "<option value=" . $item . " >" . $item . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="wraper_table px-3" id="tableThongKe">
        <!-- <table class="table px-5" id="table">
            <thead>
                <tr id="headTable">
                    <th>TT</th>
                    <th>Tên Khoa</th>
                    <th>Số Lượng đề tài</th>
                </tr>
            </thead>
            <tbody id="tableThongKe">

            </tbody>
        </table> -->
    </div>
</div>