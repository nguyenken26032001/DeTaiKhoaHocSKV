<div class="prevInformation d-flex flex-column ms-3 mt-5" style="min-height: 500px; ">
    <h4> Các tài liệu, biểu mẫu liên quan đến việc nghiên cứu khoa học</h4<?php>
    <br>
    <?php
    if (isset($dataDocuments)) {
        $data = $dataDocuments;
    }
    foreach ($data as $item) {
    ?>
        <a href="<?php echo _WEB_ROOT_ ?>/Uploads/FileTaiLieu/<?php echo $item['fileTaiLieu'] ?>">
            <li class="my-2 fs-5"><?php echo $item['tenFile'] ?></li>
        </a>
    <?php
    }
    ?>
</div>