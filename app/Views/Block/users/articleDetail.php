<div id="demo articleDetail" class="prevInformation__wrapper">
    <p class="articel__title">
        <?php echo $ArticleDetail[0]['tieuDe'] ?>
    </p>
    <img src="<?php echo _WEB_ROOT_; ?>/Uploads/<?php echo $ArticleDetail[0]['hinhAnh'];  ?>" alt="" class="articleImg" style="width:100%" />
    <p class="img--desc"><?php echo $ArticleDetail[0]['moTa'] ?></p>
    <p class="article_content noidungBaiviet">
        <?php
        echo  $ArticleDetail[0]['noiDung'];
        ?>
    </p>
</div>