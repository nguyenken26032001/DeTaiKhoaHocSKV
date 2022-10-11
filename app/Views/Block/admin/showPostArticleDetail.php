<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">THÔNG TIN BÀI ĐĂNG</h2>
            <button class="btn btn-danger delete" onclick="deletePost('<?php echo $dataPostById[0]['maDeTai']; ?>')">Xóa bài</button>
        </div>
        <form action="<?php echo _WEB_ROOT_ ?>/Admin/updatePostArticle" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="usr">Mã Đề Tài</label>
                <input type="text" class="form-control" value="<?php echo  $dataPostById[0]['maDeTai'] ?>" readonly name="maDeTai">
            </div>
            <div class="form-group">
                <label for="title">Tiêu đề bài</label>
                <input required="true" type="text" class="form-control" name="title" spellcheck="false" value="<?php echo $dataPostById[0]['tieuDe'] ?>">
            </div>
            <div class="form-group">
                <label for="content">Nội dung đề tài</label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control" spellcheck="false"><?php echo $dataPostById[0]['noiDung'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh đề tài</label>
                <input type="file" name="fileUploads" id="" accept="image/*">
                <span><?php echo $dataPostById[0]['hinhAnh'] ?></span>
            </div>
            <div class="form-group">
                <label for="image">Mô tả hình ảnh</label>
                <input type="text" name="moTa" id="" class="form-control" required value="<?php echo $dataPostById[0]['moTa']  ?>" spellcheck="false">

            </div>
            <input type="hidden" name="oldImage" value="<?php echo $dataPostById[0]["hinhAnh"] ?>">
            <button type="submit" class="btn btn-success" name="updatePostArticle" id="update" style="margin-bottom: 30px;">CẬP NHẬT</button>
        </form>
    </div>
</div>