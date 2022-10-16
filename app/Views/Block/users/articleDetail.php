<div id="demo articleDetail" class="prevInformation__wrapper">
    <h1 class="articel__title">
        <?php echo $ArticleDetail[0]['tieuDe'] ?>
    </h1>
    <img src="<?php echo _WEB_ROOT_; ?>/Uploads/postArticle/<?php echo $ArticleDetail[0]['hinhAnh'];  ?>" alt="" class="articleImg" style="width:100%" />
    <p class="img--desc"><?php echo $ArticleDetail[0]['moTa'] ?></p>
    <p class="article_content noidungBaiviet">
        <?php
        echo  $ArticleDetail[0]['noiDung'];
        ?>
    </p>
    <div class="dowload--document d-flex align-items-center mb-5 ms-3">
        <ion-icon name="download-outline" class="icon-download mr-5"></ion-icon>
        <a href="<?php echo _WEB_ROOT_ ?>/Uploads/FileArticle/<?php echo  $ArticleDetail[0]['fileBaoCao'] ?>"> DownLoad file báo cáo tại đây</a>
    </div>
</div>