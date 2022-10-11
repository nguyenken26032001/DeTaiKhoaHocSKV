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
            <a href="<?php echo _WEB_ROOT_; ?>/loginnn">ĐĂNG NHẬP</a>
        </div>
        <div class="header__content d-flex flex-column">
            <div class="header__content--right mb-2">
                <div class="header__content--logo">
                    <img src="<?php echo _WEB_ROOT_; ?>/public/image/dhspktv.png" alt="" class="logo" />
                </div>
                <div class="header__content--title">
                    <p class="header__content--title--department mb-3">
                        PHÒNG QUẢN LÝ KHOA HỌC
                    </p>
                    <p class="header__content--title--department--E">
                        Research Management Department
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
                <a href="<?php echo _WEB_ROOT_ ?>/Home" class="menu_link">HOME</a>
            </li>
            <li class="menu_item">
                <a href="" class="menu_link">TIN TỨC</a>
                <div class="menu_child">
                    <ul class="menu_child_list">
                        <li>Element</li>
                        <li>Element</li>
                        <li>Element</li>
                    </ul>
                </div>
            </li>
            <li class="menu_item">
                <a href="" class="menu_link">ĐỀ TÀI</a>
                <div class="menu_child">
                    <ul class="menu_child_list">
                        <li>Khoa công nghệ thông tin</li>
                        <li>Khoa cơ khí chế tạo</li>
                        <li>Khoa cơ khí động lực</li>
                        <li>Khoa điện</li>
                        <li>Khoa điện tử</li>
                        <li>Khoa kinh tế</li>
                        <li>Khoa ngoại ngữ</li>
                    </ul>
                </div>
            </li>
            <li class="menu_item">
                <a href="" class="menu_link">TÀI LIỆU</a>
                <div class="menu_child">
                    <ul class="menu_child_list">
                        <li>Quy trình thực hiện</li>
                        <li>Các biểu mẫu</li>
                    </ul>
                </div>
            </li>
        </ul>
        <!--  -->
        <nav class="navbar navbar-expand-lg d-block d-sm-none navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>