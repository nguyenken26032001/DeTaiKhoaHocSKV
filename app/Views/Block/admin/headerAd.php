<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminSKV | Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- summernot -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ ?>/app/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ ?>/public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ ?>/public/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo _WEB_ROOT_ ?>/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!--  custom css  link page-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- add icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ ?>/public/css/styleAdmin.css">
    <?php
    $page = $data['page'];
    if ($page == "admin/thongKe") {
    ?>
    <style>
    .content-wrapper {
        background: #ffff;
    }

    text {
        font-size: 16px;
    }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Task", "Hours per Day"],
            <?php
                    // var_dump($thongkeByKhoa);
                    foreach ($thongkeByKhoa as $item) {
                        echo "[\"" . $item['tenkhoa'] . "\"," . $item['soluong'] . "],";
                    }
                    ?>
        ]);

        var options = {
            title: "Biểu đồ thống kê đề tài",
        };

        var chart = new google.visualization.PieChart(
            document.getElementById("piechart")
        );

        chart.draw(data, options);
    }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Task", "Hours per Day"],
            <?php
                    // var_dump($thongkeByKhoa);
                    foreach ($thongKeByTypeArticle as $item) {
                        echo "[\"Đề tài " . $item['xepLoai'] . "\"," . $item['soluong'] . "],";
                    }
                    ?>
        ]);

        var options = {
            title: "Biểu đồ xếp loại đề tài",
        };

        var chart = new google.visualization.PieChart(
            document.getElementById("piechart2")
        );

        chart.draw(data, options);
    }
    </script>
    <?php
    }
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">
        <p class="setActive d-none" id="page__Active"><?php echo $pageActive; ?></p>
        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="" id="home" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo _WEB_ROOT_ ?>/" class="" id="home" target="_blank">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?php echo _WEB_ROOT_ ?>/public/image/dhspktv.png" alt="AdminLTE"
                    class="brand-image img-circle elevation-3" style="opacity: 0.8">
                <span class="brand-text font-weight-light">Admin SKV</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Menu -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="<?php echo _WEB_ROOT_ ?>/Admin" class="nav-link">
                                <i class="fa-solid fa-pager" style="padding-left: 7px;"></i>
                                <p style="padding-left: 10px;">
                                    QUẢN LÝ ĐỀ TÀI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo _WEB_ROOT_ ?>/Admin/notification" class="nav-link"
                                style="padding-left: 22px">
                                <i class="fa-regular fa-bell" style="padding-right: 10px;"></i>
                                <p>
                                    THÔNG BÁO
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo _WEB_ROOT_ ?>/Admin/document" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    TÀI LIỆU
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo _WEB_ROOT_ ?>/Admin/classManagement" class="nav-link">
                                <i class="fa-solid fa-school" style="padding-right: 5px; margin-left:4px;"></i>
                                <p>
                                    QUẢN LÝ LỚP
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo _WEB_ROOT_ ?>/Admin/postArticle" class="nav-link">
                                <i class="fa-regular fa-address-card" style="padding-right: 7px; margin-left:5px;"></i>
                                <p>
                                    ĐĂNG BÀI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo _WEB_ROOT_ ?>/Admin/Statistical" class="nav-link">
                                <i class="fa-solid fa-chart-simple" style="padding-right: 10px; margin-left:5px;"></i>
                                <p>
                                    THỐNG KÊ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo _WEB_ROOT_ ?>/Admin/banner" class="nav-link">
                                <i class="fa-solid fa-image" style="padding-right: 10px; margin-left:5px;"></i>
                                <p>
                                    BANNER
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>