<div class="content-wrapper" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
    <div class="panel panel-primary">

        <div class="panel-heading primary">
            <h2 class="text-center">QUẢN LÝ ĐỀ TÀI</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin" class="link_file">Thêm mới đề tài</a>
            <div id="notifi">
            </div>

        </div>
        <table class="table table-hover table-fixed  table-bordered text-center mt-5">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Mã ĐT</th>
                    <th>Tên đề tài</th>
                    <th>Khoa chủ trì</th>
                    <th>Mục tiêu nghiên cứu</th>
                    <th>Sản phẩm nghiên cứu</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php
                if (isset($data['dataArticle'])) {
                    $data = $data['dataArticle'];
                }
                $index = 0;
                foreach ($data as $item) {
                    echo ' 
                    <tr data-href="../Admin/ArticleDetail/' . $item['maDeTai'] . '/' . $item['khoaChuTri'] . '">
                    <td>' . (++$index) . '</td>
                    <td >' . $item['maDeTai'] . '</td>
                    <td>' . $item['tenDeTai'] . '</td>
                    <td>' . $item['khoaChuTri'] . '</td>
                    <td> <p class="text__Article">' . $item['mucTieuNghienCuu'] . ' </p></td>
                    <td style="width:350px"> <p class="text__Article">' . $item['sanPhamNghienCuu'] . ' </p></td>
                </tr>';
                }

                ?>
            </tbody>

        </table>

    </div>
</div>