<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Alice&family=Comfortaa:wght@500;700&family=Encode+Sans:wght@700;800&family=Merriweather:wght@300&family=Montserrat:wght@300;400;600&family=Open+Sans:wght@300;400;600&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/app/FrameWork/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/public/css/login.css" />
    <title>Form Login</title>
</head>

<body>
    <div class="loin d-flex w-100">
        <div class="form-login px-5 d-flex flex-column align-items-center justify-content-center">
            <form action="<?php echo _WEB_ROOT_ ?>/login/dangnhap" method="POST"
                class="d-flex flex-column justify-content-center align-items-center gap-4">
                <div class="form-login-logo">
                    <img src="<?php echo _WEB_ROOT_ ?>/Uploads/images/Logo_School-637af54c49cd8.png" alt=""
                        width="400px" />
                </div>
                <div class="line text-center">
                    <h5>----- * -----</h5>
                </div>
                <div class="user-name d-flex overflow-hidden">
                    <i class="icon fa-solid fa-user d-flex justify-content-center align-items-center"></i>
                    <input class="px-2" type="email" placeholder="Nhập tài khoản email" required name="email" />
                </div>
                <div class="user-name pass d-flex overflow-hidden">
                    <i class="icon fa-solid fa-user d-flex justify-content-center align-items-center"></i>
                    <input class="input px-2" type="password" id="password" placeholder="Nhập mật khẩu" required
                        name="password" />
                    <span class="d-flex justify-content-center align-items-center" id="tooglebtn"></span>
                </div>
                <div class="loginsubmit d-flex">
                    <input type="submit" value="Đăng nhập" name="submit" />
                </div>
            </form>
        </div>
        <div class="img-login"
            style="background: url(<?php echo _WEB_ROOT_ ?>/Uploads/Images/Bg_Transparent-637af57005847.jpg);background-size: cover">
            <img src="<?php echo _WEB_ROOT_ ?>/Uploads/images/Bg_Thubnail-637af56694f59.png" alt="" />
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo _WEB_ROOT_; ?>/public/js/login.js"></script>
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