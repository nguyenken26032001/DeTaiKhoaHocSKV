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
                PHÒNG KHOA HỌC - HỢP TÁC QUỐC TẾ
            </p>
            <div class="footer__content--address d-flex  mb-3">
                <ion-icon name="home" class="icon home"></ion-icon>
                <p id="footer__content--address--detail" class="address--detail">
                    Địa Chỉ: Phòng 504, Tòa nhà Khoa học công nghệ Thư viện, Trường Đại học Sư phạm Kỹ thuật Vinh
                    Số 117, Đường Nguyễn Viết Xuân, Phường Hưng Dũng, TP. Vinh, Nghệ An
                </p>
                <p class="address--responsive"></p>
            </div>
            <div class="contact d-flex align-items-center mb-3">
                <div class="contact__phone d-flex">
                    <ion-icon name="call" class="icon iconPhone"></ion-icon>
                    <p id="contact__phone--detail">0238 3842 753</p>
                </div>
                <div class="contact__email">
                    <p>Email : khhtqt.skv@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="copyRight d-flex">
            <div class="copyRight__left">
                <span style="font-size: 17px; color: white" class="copyright">Copyright</span>
                <i class="fa-regular fa-copyright icon icon--copyright"></i>
                <span style="color: white" class="school">
                    2022, Trường Đại học Sư phạm Kỹ thuật Vinh</span>
            </div>
            <div class="copyRight__right">
                <p class="developerBy">Design and Developer by SKV</p>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo _WEB_ROOT_ ?>/app/FrameWork/bootstrap-5/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
<script>
swal({
    title: "",
    text: "<?php echo $_SESSION['status'] ?>",
    icon: "<?php echo $_SESSION['status_code'] ?>",
    button: "ok",
});
</script>
<?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>

</html>