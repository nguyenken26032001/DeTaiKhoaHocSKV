<div id="demo" class="prevInformation__wrapper">
    <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="  <?php echo _WEB_ROOT_ ?>/Uploads/Banner/<?php echo $Carousel[0]["hinhAnh"] ?>" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="<?php echo _WEB_ROOT_ ?>/Uploads/Banner/<?php echo $Carousel[1]["hinhAnh"] ?>" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="  <?php echo _WEB_ROOT_ ?>/Uploads/Banner/<?php echo $Carousel[2]["hinhAnh"] ?>" class="d-block w-100" alt="..." />
            </div>
        </div>
    </div>
    <div class="content__main" style="margin-top: 20px">
        <?php
        foreach ($dataDetai as $item) {
        ?>
            <div class="article d-flex mb-5 align-items-center">
                <img src="<?php echo _WEB_ROOT_ ?>/Uploads/PostArticle/<?php echo $item['hinhAnh'] ?>" class="img-fluid" />
                <div class="article__content ms-2 mw-100">
                    <a href="<?php echo _WEB_ROOT_ ?>/Home/ArticleDetail/<?php echo $item['maDeTai'] ?>"><?php echo $item['tieuDe'] ?></a>
                </div>
            </div>

        <?php
        }
        ?>

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
</div>