<div class="prevInformation" style="min-height: 500px; flex-direction:column; margin-top: 50px  ;">
    <?php
    foreach ($dataDeTaiByLink as $item) {
    ?>
        <div class="article d-flex mb-5 align-items-center mx-2">
            <img src="<?php echo _WEB_ROOT_ ?>/Uploads/PostArticle/<?php echo $item['hinhAnh'] ?>" class="img-fluid" />
            <div class="article__content ms-2 mw-100">
                <a href="<?php echo _WEB_ROOT_ ?>/Home/ArticleDetail/<?php echo $item['maDeTai'] ?>">
                    <?php echo $item['tieuDe'] ?>
                </a>
            </div>
        </div>
    <?php } ?>
    <div class="page__number mb-4" style="margin-top: 250px;">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $numberPages; $i++) {
                    if ($pageIndex == $i) {
                        echo ' <li class="page-item">
                            <a class="page-link active" href="?page=' . $i . '">' . $i . '</a>
                                </li>';
                    } else {
                        echo ' <li class="page-item">
                            <a class="page-link " href="?page=' . $i . '">' . $i . '</a>
                                </li>';
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
</div>