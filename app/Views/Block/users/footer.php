<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Footer</title>
</head>

<body>
    <div class="footer d-flex flex-column">
        <div class="footer__content d-flex flex-column">
            <p id="footer__content--title" class="mb-4 mt-3">
                PHÒNG QUẢN LÝ KHOA HỌC
            </p>
            <div class="footer__content--address d-flex  mb-3">
                <ion-icon name="home" class="icon home"></ion-icon>
                <p id="footer__content--address--detail" class="address--detail">
                    Địa Chỉ: P201 tầng 5 nhà A1 Trường Đại học Sư phạm kỹ thuật Vinh,
                    117 Nguyễn Viết Xuân, Phường Hưng Dũng, TP Vinh
                </p>
                <p class="address--responsive"></p>
            </div>
            <div class="contact d-flex align-items-center mb-4">
                <div class="contact__phone d-flex">
                    <ion-icon name="call" class="icon iconPhone"></ion-icon>
                    <p id="contact__phone--detail">0825871266</p>
                </div>
                <div class="contact__email">
                    <p>Email : khhtqt.skv@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="copyRight d-flex">
            <div class="copyRight__left">
                <span style="font-size: 16px; color: white" class="copyright">Copyright</span>
                <i class="fa-regular fa-copyright icon icon--copyright"></i>
                <span style="color: white" class="school">
                    2022, Trường Đại học Sư phạm kỹ thuật Vinh</span>
            </div>
            <div class="copyRight__right">
                <p class="developerBy">Design and Developer by SKV</p>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo _WEB_ROOT_ ?>/app/FrameWork/bootstrap-5/js/bootstrap.min.js"></script>

</html>