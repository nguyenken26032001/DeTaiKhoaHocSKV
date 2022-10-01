<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Alice&family=Comfortaa:wght@500;700&family=Encode+Sans:wght@700;800&family=Merriweather:wght@300&family=Montserrat:wght@300;400;600&family=Open+Sans:wght@300;400;600&family=Ubuntu:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/app/FrameWork/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/public/css/login.css" />
    <title>Form Login</title>
</head>

<body>
    <div id="total">
        <form action="" id="formLogin" method="POST" name="formlogin">
            <div class="picture">
                <img src="./public/image/dhspktv.png" class="image" alt="" width="120px" height="auto" />
            </div>
            <div class="block">
                <div class="line"></div>
                <div class="hoatiet">-- * --</div>
            </div>
            <div id="formgroup">
                <input type="text" class="forminput" placeholder="Tên đăng nhập" name="username" required />
            </div>
            <div id="formgroup">
                <input type="password" class="forminput" id="password" placeholder="Mật khẩu" name="password" required />
                <div id="eye">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="ĐĂNG NHẬP" class="formsubmit" name="submit" />
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="<?php echo _WEB_ROOT_; ?>public/js/login.js"></script>

</html>