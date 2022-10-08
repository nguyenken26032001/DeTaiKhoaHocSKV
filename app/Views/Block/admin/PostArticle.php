<div class="content-wrapper" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading primary">
            <h2 class="text-center">ĐĂNG BÀI VỀ ĐỀ TÀI</h2>
            <a href="<?php echo _WEB_ROOT_ ?>/Admin/postManager" class="link_file btn btn-outline-info">Quản lý bài đăng</a>
        </div>
        <form action="<?php echo _WEB_ROOT_ ?>/Admin/AddPostArticle" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="usr">Mã Đề Tài</label>
                <select name="maDeTai" id="" class="form-control">
                    <?php
                    if (isset($listMaDeTai)) {
                        foreach ($listMaDeTai as $item) {
                            echo '<option value="' . $item['maDeTai'] . '">' . $item['maDeTai'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Tiêu đề bài</label>
                <input required="true" type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="content">Nội dung đề tài</label>
                <textarea name="content" id="" cols="30" rows="10" spellcheck="false" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Hình ảnh đề tài</label>
                <input type="file" name="fileUploads" id="" required>
            </div>
            <div class="form-group">
                <label for="content">Mô tả hình ảnh</label>
                <input type="text" name="moTa" id="" required class="form-control">
            </div>
            <button type="submit" class="btn btn-success" name="postArticle" id="add" style="margin-bottom: 30px;">ĐĂNG BÀI</button>
        </form>
    </div>
</div>