<div class="content-wrapper" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
    <div class="panel panel-primary">

        <div class="panel-heading primary">
            <h2 class="text-center">SỬA ẢNH BANNER</h2>
        </div>
        <table class="table table-hover table-fixed text-center mt-5">
            <tbody>
                <form action="<?php echo _WEB_ROOT_ ?>/Admin/updatedBanner" method="post" enctype="multipart/form-data">
                    <tr class="d-flex justify-content-around align-items-center">
                        <td><img id="changeImage" src="<?php echo _WEB_ROOT_ ?>/Uploads/Banner/<?php echo $bannerId[0]['hinhAnh'] ?>" width="250px" /></td>
                        <td>
                            <button class="btn btn-outline-info" name="fileUploads"> Sửa</button>
                        </td>
                    </tr>

            </tbody>
        </table>
        <input type="hidden" name="idBanner" id="" value="<?php echo $bannerId[0]['id'] ?>">
        <input type="hidden" name="oldImage" id="" value="<?php echo $bannerId[0]['hinhAnh'] ?>">
        <input type="file" name="fileUpdateBanner" id="file" accept="image/*" onchange="previewImage()" />
        </form>


    </div>
</div>