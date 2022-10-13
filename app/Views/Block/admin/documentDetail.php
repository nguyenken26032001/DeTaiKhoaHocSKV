<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">TÀI LIỆU CHI TIẾT</h2>
        </div>
        <form action="<?PHP echo _WEB_ROOT_ ?>/document/updateDocument" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $documentDetai[0]['id'] ?>">
            <div class="form-group mt-5">
                <label for="">Tên tài liệu</label>
                <input type="text" class="form-control" name="decsDoc" spellcheck="false" required value="<?php echo $documentDetai[0]['tenFile'] ?>">
            </div>
            <div class="form-group">
                <label for="">File đính kèm</label>
                <input type="file" name="fileUploads">
                <span><?php echo $documentDetai[0]['fileTaiLieu'] ?></span>
            </div>
            <input type="hidden" name="file_Old" value=" <?php echo $documentDetai[0]['fileTaiLieu'] ?>">
            <div class="button_feature d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4 py-2" name="updateDocument"> Cập nhật </button>
            </div>
        </form>
    </div>
</div>