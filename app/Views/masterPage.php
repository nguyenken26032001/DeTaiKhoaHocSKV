<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/public/css/reset.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/app/FrameWork/bootstrap-5/css/bootstrap.min.css">
    <!-- import font -->
    <link href="https://fonts.googleapis.com/css2?family=Alice&family=Comfortaa:wght@500;700&family=Encode+Sans:wght@700;800&family=Merriweather:wght@300&family=Montserrat:wght@300;400;600&family=Open+Sans:wght@300;400;600&family=Ubuntu:wght@300&display=swap" rel="stylesheet" />
    <!-- import icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- import libraries iconicon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/public/css/styleMain.css">
    <?php if (isset($data["css"])) {
    ?>
        <link rel="stylesheet" href='<?php echo _WEB_ROOT_; ?>/public/css/<?php echo $data["css"]; ?>.css'>
    <?php } ?>
    <title>Master Page</title>
</head>

<body>
    <div class=" page_container">
        <div class="page_content">
            <?php include "app/Views/Block/" . $data["header"] . ".php" ?>
            <div class="prevInformation">
                <?php include "app/Views/Block/" . $data['page'] . ".php" ?>
                <?php include 'app/Views/Block/users/notification.php' ?>
            </div>
            <?php include 'app/Views/Block/users/footer.php' ?>
        </div>
    </div>
    <script src="<?php echo _WEB_ROOT_; ?>app/FrameWork/bootstrap-5/js/bootstrap.min.js"></script>
    <script src="<?php echo _WEB_ROOT_; ?>app/public/js/style.js"></script>
</body>

</html>