<?php
if (isset($data['dataDepartments'])) {
    $dataKhoa = $data['dataDepartments'];
}
if (isset($data['Action'])) {
    $pageActive = $data['Action'];
}
if (isset($data["dataArticleByID"])) {
    $dataArticleDetail = $data["dataArticleByID"];
}
if (isset($data["dataClass"])) {
    $dataClass = $data["dataClass"];
}
if (isset($data["Numbermember"])) {
    $Numbermember = $data["Numbermember"];
}
if (isset($data["member"])) {
    $member = $data["member"];
}
if (isset($data["showNotification"])) {
    $notifi = $data["showNotification"];
}
if (isset($data["member"])) {
    $member = $data["member"];
}
if (isset($data["maKhoa_added"])) {
    $maKhoa_added = $data["maKhoa_added"]; // reciver maKhoa_added when added lop 
}
if (isset($data["listClassByDepartment"])) {
    $dataClassByDepartment = $data["listClassByDepartment"];
}
//notification data
if (isset($data["dataNotification"])) {
    $dataNotification = $data["dataNotification"];
}
if (isset($data["dataNotificationByID"])) {
    $dataNotificationByID = $data["dataNotificationByID"];
}

?>
<?php include "app/Views/Block/admin/headerAd.php" ?>
<?php include "app/Views/Block/" . $data['page'] . ".php" ?>
<?php include "app/Views/Block/admin/footerAd.php" ?>
