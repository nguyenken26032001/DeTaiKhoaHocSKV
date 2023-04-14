<div class="content-wrapper">
    <div class="header-thongke d-flex justify-content-center position-relative" style="background-color: #624bff; height: 150px">
        <h3 class="text-light pt-4">Thống kê</h3>
        <div class="wrapper-card d-flex ">
            <div class="card shadow mt-3 mx-2" style="width: 18rem ">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title px-3">Tổng số đề tài</h5>
                    <i class="bi bi-briefcase icon  fs-4 p-2 px-3 shadow rounded-2 text-primary" style="background-color: #e0dcfe"></i>
                </div>
                <h3 class="number mx-4 fs-1 fw-bold mb-4">
                    <?php if (isset($totalArticle))
                        echo $totalArticle[0]['numberArticle'] ?>
                </h3>
            </div>
            <div class="card shadow mt-3 mx-2" style="width: 18rem ">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title px-3">Đề tài loại Khá</h5>
                    <i class="bi bi-bag-check icon fs-4 p-2 px-3 shadow rounded-2 text-primary" style="background-color: #e0dcfe"></i>
                </div>
                <h3 class="number mx-4 fs-1 fw-bold mb-4">
                    <?php if (isset($deTaiKha))
                        echo $deTaiKha[0]['numberArticle'] ?>
                </h3>
            </div>
            <div class="card shadow mt-3 mx-2" style="width: 18rem ">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title px-3">Tổng sv tham gia</h5>
                    <i class="bi bi-people  icon fs-4 fs-4 p-2 px-3 shadow rounded-2 text-primary" style="background-color: #e0dcfe"></i>
                </div>
                <h3 class="number mx-4 fs-1 fw-bold mb-4"><?php if (isset($totalStudent)) echo $totalStudent[0]['number'] ?></h3>
            </div>
        </div>
    </div>
    <div class="chart d-flex">
        <div id="piechart" style="width: 600px; height: 400px;margin-top: 100px"></div>
        <div id="piechart2" style="width: 600px; height: 400px;margin-top: 100px"></div>
    </div>
    <h5 class="float-right mr-4"><a href="<?php echo _WEB_ROOT_ ?>/Statistical/Thongketheotieuchi">Thống kê theo các tiêu chí </a></h5>
</div>