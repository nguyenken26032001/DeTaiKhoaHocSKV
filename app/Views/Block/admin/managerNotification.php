<div class="content-wrapper" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
    <div class="panel panel-primary">

        <div class="panel-heading primary">
            <h2 class="text-center">QUẢN LÝ THÔNG BÁO</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/notification" class="link_file btn btn-outline-info">Đăng thông báo mới</a>
            <div id="notifi">
            </div>

        </div>
        <table class="table table-hover table-fixed  table-bordered text-center mt-5">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>TIÊU ĐỀ</th>
                    <th>NỘI DUNG</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php
                if (isset($data['dataNotification'])) {
                    $data = $data['dataNotification'];
                }
                $index = 0;
                foreach ($data as $item) {
                    echo ' 
                    <tr data-href="../Admin/NotificationDetail/' . $item['id'] . '">
                    <td>' . (++$index) . '</td>
                    <td> <p class="text__Article">' . $item['tieuDe'] . '</p></td>
                    <td> <p class="text__Article">' . $item['noiDung'] . ' </p></td>
                </tr>';
                }

                ?>
            </tbody>

        </table>

    </div>
</div>