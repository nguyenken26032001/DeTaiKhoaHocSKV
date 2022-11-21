<div class="content-wrapper" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
    <div class="panel panel-primary">

        <div class="panel-heading primary">
            <h2 class="text-center">QUẢN LÝ BANNER</h2>
        </div>
        <table class="table table-hover table-fixed text-center mt-5">
            <tbody>
                <?php
                foreach ($banner as $item) {
                    echo '
            <tr class="d-flex justify-content-around align-items-center">
               <td><img src="' . _WEB_ROOT_ . '/Uploads/Banner/' . $item['hinhAnh'] . '" width="250px"/></td> 
               <td ><a class="btn btn-outline-info" href="' . _WEB_ROOT_ . '/Admin/updateBanner/' . $item['id'] . '" > Thay ảnh</a></td> 
            </tr>
                ';
                }
                ?>

            </tbody>

        </table>
        <form action="<?php echo _WEB_ROOT_ ?>/uploads_images_system/uploads_images" method="post"
            enctype="multipart/form-data">
            <input type="file" name="fileUploads" id="" required>
            <button class="btn btn-success" name="uploads">UPload images</button>
        </form>

    </div>
</div>