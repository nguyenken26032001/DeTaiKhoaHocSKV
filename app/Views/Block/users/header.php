<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>header</title>
</head>

<body>
    <div class="header">
        <div class="login">
            <i class="far fa-user"></i>
            <a href="<?php echo _WEB_ROOT_ ?>/login">ĐĂNG NHẬP</a>
        </div>
        <div class="header__content d-flex flex-column">
            <div class="header__content--right mb-2">
                <div class="header__content--logo">
                    <img src="<?php echo _WEB_ROOT_; ?>/public/image/dhspktv.png" alt="" class="logo" />
                </div>
                <div class="header__content--title">
                    <p class="header__content--title--department mb-3">
                        PHÒNG KHOA HỌC - HỢP TÁC QUỐC TẾ
                    </p>
                    <p class="header__content--title--department--E">
                        Science Management - International Cooperation Department
                    </p>
                </div>
            </div>
            <p class="header__content--slogan">
                KẾT NỐI TRI THỨC - VỮNG BƯỚC TƯƠNG LAI
            </p>
        </div>
    </div>
    <div class="menu">
        <ul class="menu_main">
            <li class="menu_item">
                <a href="<?php echo _WEB_ROOT_ ?>/trang-chu.html" class="menu_link">TIN TỨC</a>
                <div class="menu_child">
                    <ul class="menu_child_list">
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/hoat-dong-khac.html">
                            <li>Tin tức về hoạt động khác</li>
                        </a>

                    </ul>
                </div>
            </li>
            <li class="menu_item">
                <a class="menu_link">ĐỀ TÀI</a>
                <div class="menu_child">
                    <ul class="menu_child_list">
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/De-tai-nghien-cuu-khoa-CNTT.html">
                            <li>Khoa công nghệ thông tin</li>
                        </a>
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/De-tai-nghien-cuu-khoa-CKCT.html">
                            <li>Khoa cơ khí chế tạo</li>
                        </a>
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/De-tai-nghien-cuu-khoa-CKDL.html">
                            <li>Khoa cơ khí động lực</li>
                        </a>
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/De-tai-nghien-cuu-khoa-Dien.html">
                            <li>Khoa điện</li>
                        </a>
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/De-tai-nghien-cuu-khoa-ĐT.html">
                            <li>Khoa điện tử</li>
                        </a>
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/De-tai-nghien-cuu-khoa-KT.html">
                            <li>Khoa kinh tế</li>
                        </a>
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/De-tai-nghien-cuu-khoa-NN.html">
                            <li>Khoa ngoại ngữ</li>
                        </a>
                    </ul>
                </div>
            </li>
            <li class="menu_item">
                <a class="menu_link">TÀI LIỆU</a>
                <div class="menu_child">
                    <ul class="menu_child_list">
                        <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/tai-lieu.html">
                            <li>Các biểu mẫu</li>
                        </a>

                    </ul>
                </div>
            </li>
        </ul>
        <nav class="navbar navbar-expand-lg d-block d-sm-none navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="menu_item">
                            <a href="<?php echo _WEB_ROOT_ ?>/Home" class="menu_link">TIN TỨC</a>
                        </li>
                        <li class="menu_item">
                            <a href="" class="menu_link">ĐỀ TÀI</a>
                            <div class="menu_child">
                                <ul class="menu_child_list">
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/NCKH/CNTT">
                                        <li>Khoa công nghệ thông tin</li>
                                    </a>
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/NCKH/CKCT">
                                        <li>Khoa cơ khí chế tạo</li>
                                    </a>
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/NCKH/CKDL">
                                        <li>Khoa cơ khí động lực</li>
                                    </a>
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/NCKH/Dien">
                                        <li>Khoa điện</li>
                                    </a>
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/NCKH/ĐT">
                                        <li>Khoa điện tử</li>
                                    </a>
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/NCKH/KT">
                                        <li>Khoa kinh tế</li>
                                    </a>
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/NCKH/NN">
                                        <li>Khoa ngoại ngữ</li>
                                    </a>
                                </ul>
                            </div>
                        </li>
                        <li class="menu_item">
                            <a href="" class="menu_link">TÀI LIỆU</a>
                            <div class="menu_child">
                                <ul class="menu_child_list">
                                    <a class="find__byLink" href="<?php echo _WEB_ROOT_ ?>/Home/document">
                                        <li>Các biểu mẫu</li>
                                    </a>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <form action="" method="GET">
        <div class="search">
            <input type="text" name="search" id="" class="inputSearch" placeholder="Tìm kiếm......" />
            <button type="submit" class="button">Tìm Kiếm</button>
        </div>
    </form>
</body>

</html>