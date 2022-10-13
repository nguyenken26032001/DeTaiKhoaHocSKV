<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">THÊM TÀI LIỆU</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/document/documentManager" class="link_file btn btn-outline-info">Quản lý tài liệu</a>
        </div>
        <form action="<?PHP echo _WEB_ROOT_ ?>/document/addDocument" method="post" enctype="multipart/form-data">
            <div class="form-group mt-5">
                <label for="">Tên tài liệu</label>
                <input type="text" class="form-control" name="decsDoc" spellcheck="false" required>
            </div>
            <div class="form-group">
                <label for="">File đính kèm</label>
                <input type="file" name="fileUploads" required>
            </div>
            <div class="button_feature d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4 py-2" name="addDocument"> THÊM </button>
            </div>
        </form>
    </div>
</div>