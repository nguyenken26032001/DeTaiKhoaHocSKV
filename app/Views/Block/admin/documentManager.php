<div class="content-wrapper" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">QUẢN LÝ TÀI LIỆU</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/document" class="link_file btn btn-outline-info">Thêm tài liệu mới</a>
        </div>
        <table class="table table-hover table-fixed  table-bordered text-center mt-5">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>TÊN TÀI LIỆU</th>
                    <th>FILE ĐÍNH KÈM</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php
                if (isset($data['listDocuments'])) {
                    $data = $data['listDocuments'];
                }
                $index = 0;
                foreach ($data as $item) {
                    echo ' 
                    <tr data-href="../document/documentDetail/' . $item['id'] . '">
                    <td>' . (++$index) . '</td>
                    <td> <p class="text__Article">' . $item['tenFile'] . '</p></td>
                    <td> <p class="text__Article">' . $item['fileTaiLieu'] . ' </p></td>
                </tr>';
                }

                ?>
            </tbody>

        </table>

    </div>
</div>