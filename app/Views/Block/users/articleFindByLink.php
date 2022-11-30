<div class="prevInformation" style="min-height: 500px; flex-direction:column; margin-top: 50px  ;">
    <div class="input-group mx-5 mb-3">
        <form action='' method="get">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm..." name="search" />
            </div>
        </form>
    </div>
    <?php
    foreach ($dataDeTaiByLink as $item) {
    ?>
    <div class="article d-flex mb-3 align-items-center mx-2 text-start " style="font-size: 20px;">
        <div class="article__content ms-2 mw-100">
            <a href="<?php echo _WEB_ROOT_; ?>/Home/ThongTinChiTietDeTai/<?php echo $item['maDeTai'] ?>">
                <li>
                    <?php echo $item['tenDeTai'] ?>
                </li>
            </a>
        </div>
    </div>
    <?php } ?>
    <div class="page__number mb-4" style="margin-top: 250px;">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $pages; $i++) {
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