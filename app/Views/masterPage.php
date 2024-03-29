<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php

                                    use PhpOffice\PhpSpreadsheet\Cell\Cell;

                                    echo _WEB_ROOT_; ?>/public/css/reset.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/app/FrameWork/bootstrap-5/css/bootstrap.min.css">
    <!-- import icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- import libraries iconicon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- import font -->
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&display=swap");
    </style>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_; ?>/public/css/styleMain.css">
    <?php if (isset($data["css"])) {
    ?>
    <link rel="stylesheet" href='<?php echo _WEB_ROOT_; ?>/public/css/<?php echo $data["css"]; ?>.css'>
    <?php } ?>
    <title>HOME PAGE</title>
</head>
<?php
if (isset($data["Carousel"])) {
    $Carousel = $data["Carousel"];
}
if (isset($data["dataDetai"])) {
    $dataDetai = $data["dataDetai"];
}
if (isset($data["notifications"])) {
    $notifications = $data["notifications"];
}
if (isset($data["numberPost"])) {
    $numberPost = $data["numberPost"];
    $pages = ceil($numberPost / 10);
}
if (isset($data["pageIndex"])) {
    $pageIndex = $data["pageIndex"];
}
if (isset($data["ArticleDetail"])) {
    $ArticleDetail = $data["ArticleDetail"];
}
//notification details
if (isset($data["dataNotificationDetail"])) {
    $notificationDetail = $data["dataNotificationDetail"];
}
// tìm kiếm trên thanh navbar
if (isset($data["dataDeTaiByLink"])) {
    $dataDeTaiByLink = $data["dataDeTaiByLink"];
}
if (isset($data["dataDocuments"])) {
    $dataDocuments = $data["dataDocuments"];
}
//tin tuc khac
if (isset($data["dataNews"])) {
    $dataNews = $data["dataNews"];
}

?>

<body>
    <div class=" page_container">
        <div class="page_content">
            <?php include "app/Views/Block/" . $data["header"] . ".php" ?>
            <div class="prevInformation">
                <?php include "app/Views/Block/" . $data['page'] . ".php" ?>
                <?php if (isset($data['pageNotifi'])) include "app/Views/Block/users/" . $data['pageNotifi'] . ".php" ?>
            </div>
            <?php include 'app/Views/Block/users/footer.php' ?>
        </div>
    </div>
    <script src="<?php echo _WEB_ROOT_; ?>app/FrameWork/bootstrap-5/js/bootstrap.min.js"></script>
    <script src="<?php echo _WEB_ROOT_; ?>app/public/js/style.js"></script>
</body>

</html>