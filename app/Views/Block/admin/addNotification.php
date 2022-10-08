<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">ĐĂNG THÔNG BÁO MỚI</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/notificationManager" class="link_file btn btn-outline-info">Xem thông báo</a>
        </div>
        <form action="<?php echo _WEB_ROOT_ ?>/Admin/AddNotifi" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Tiêu đề thông báo</label>
                <input required="true" type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="content">Nội dung thông báo</label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="">File đính kèm </label>
                <input type="file" id="address" name="fileUploads" required="true" multiple="multiple" style="margin-left: 59px;">
            </div>
            <button type="submit" class="btn btn-success mt-3 px-5" name="addNoti" id="add" style="margin-bottom: 30px;">ĐĂNG</button>
        </form>
    </div>
</div>