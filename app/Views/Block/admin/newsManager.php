<div class="content-wrapper" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
    <div class="panel panel-primary">

        <div class="panel-heading primary">
            <h2 class="text-center">QUẢN LÝ BÀI ĐĂNG TIN TỨC</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/postArticle" class="link_file btn btn-outline-info">Đăng bài</a>
        </div>
        <div class="input-group mt-4">
            <form action='' method="get">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm..." name="search" />
                </div>
            </form>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/postManager" class="link_file btn btn-outline-info">Quản lý bài đăng
                đề tài</a>
        </div>
        <?php
        if (isset($data['dataNews'])) {
        ?>
        <table class="table table-hover table-fixed  table-bordered text-center mt-5" id="tableNews">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>TIÊU ĐỀ</th>
                    <th>NỘI DUNG</th>
                    <th>HÌNH ẢNH</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php
                    if (isset($data['dataNews'])) {
                        $dataNews = $data['dataNews'];
                    }
                    $index = 0;
                    foreach ($dataNews as $item) {
                        echo ' 
                    <tr data-href="../Tintuc/NewsDetail/' . $item['id'] . '">
                    <td>' . (++$index) . '</td>
                    <td><p class="text__Article">' . $item['tieuDe'] . '</p></td>
                    <td> <p class="text__Article">' . $item['noiDung'] . ' </p></td>
                    <td> <img src="../Uploads/PostNews/' . $item['hinhAnh'] . '" width="150px"/> </td>
                </tr>';
                    }

                    ?>
            </tbody>
        </table>
        <?php
        }
        ?>

    </div>
</div>