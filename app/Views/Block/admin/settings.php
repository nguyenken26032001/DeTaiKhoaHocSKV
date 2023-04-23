<div class="content-wrapper" style="padding-left: 70px; padding-right: 20px; padding-top: 20px;">
    <div class="panel panel-primary">

        <div class="panel-heading primary">
            <h2 class="text-center">CÀI ĐẶT HỆ THỐNG</h2>
        </div>
        <div class="row d-flex align-items-center">
            <img src="https://plus.unsplash.com/premium_photo-1675827055694-010aef2cf08f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=824&q=80" class="img-responsive image-admin" id="img-admin" alt="Image">
            <input type="file" id="file-input" onchange="handleFileSelect()">
            <div>
                <button class="btn btn-primary ml-4" onclick="document.getElementById('file-input').click()">Thay Đổi</button>
            </div>
        </div>
        <div class="row my-4">
        <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="name" required="true" name="nameAdmin" spellcheck="false" value="<?php echo $infoAdmin[0]['name']?>">
            </div>
            <div class="form-group mx-4">
                <label for="">Email</label>
                <input type="text" class="form-control" id="address" required="true" name="emailAdmin" spellcheck="false" value="<?php echo $infoAdmin[0]['email']?>">
            </div>
        </div>
    </div>
</div>