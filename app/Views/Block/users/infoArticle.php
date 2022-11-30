<?php
if (isset($data['ArticleDetail'])) {
    $data = $data['ArticleDetail'];
}
?>
<div id="demo articleDetail" class="prevInformation__wrapper">
    <h1 class="articel__title">
        <?php echo $data[0]['tenDeTai'] ?>
    </h1>
    <div class="d-flex flex-row mx-2">
        <h5>Chủ nhiệm đề tài: </h5>
        <h5 class="px-3"> <?php echo $data[0]['chuNhiemDeTai'] ?></h5>
    </div>
    <h3 class="mx-2">Mục tiêu nghiên cứu:</h3>
    <p class="article_content noidungBaiviet">
        <?php
        echo  $data[0]['mucTieuNghienCuu'];
        ?>
    </p>
    <?php
    if (isset($data[0]['fileBaoCao'])) {
    ?>
    <div class="dowload--document d-flex align-items-center mb-5 ms-3">
        <ion-icon name="download-outline" class="icon-download mr-5"></ion-icon>
        <a href="<?php echo _WEB_ROOT_ ?>/Uploads/FileArticle/<?php echo  $data[0]['fileBaoCao'] ?>"> DownLoad
            file báo cáo tại đây</a>
    </div>
    <?php
    }
    ?>
</div>