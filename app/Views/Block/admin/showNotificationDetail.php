<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">CHI TIẾT THÔNG BÁO</h2>
            <button class="btn btn-danger delete" onclick="deleteNotification('<?php echo $dataNotificationByID[0]['id']; ?>')">Xóa thông báo</button>
        </div>
        <form action="<?php echo _WEB_ROOT_ ?>/Admin/UpdateNoti" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $dataNotificationByID[0]['id'] ?>">
            <div class="form-group">
                <label for="email">Tiêu đề thông báo</label>
                <input required="true" type="text" class="form-control" name="title" value="<?php echo $dataNotificationByID[0]['tieuDe'] ?>">
            </div>
            <div class="form-group">
                <label for="content">Nội dung thông báo</label>
                <textarea name="content" id="content" cols="30" rows="10"><?php echo $dataNotificationByID[0]['noiDung'] ?></textarea>
            </div>

            <div class="form-group">
                <label for="">File đính kèm </label>
                <input type="file" id="address" name="fileUploads" multiple="multiple" style="margin-left: 59px;">
                <span><?php echo $dataNotificationByID[0]['fileDinhKem']   ?></span>
            </div>
            <input type="hidden" name="file_old" value="<?php echo $dataNotificationByID[0]['fileDinhKem']   ?>">
            <button type="submit" class="btn btn-success mt-3 px-5" name="updateNoti" id="add" style="margin-bottom: 30px;">Update</button>
        </form>
    </div>
</div>