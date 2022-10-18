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
if (isset($data["dataClassMember"])) {
    $dataClassMember = $data["dataClassMember"];
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
//data post
if (isset($data["dataPost"])) {
    $dataPost = $data["dataPost"];
}
if (isset($data["dataPostById"])) {
    $dataPostById = $data["dataPostById"];
}
if (isset($data["listMaDeTai"])) {
    $listMaDeTai = $data["listMaDeTai"];
}
if (isset($data["dataMaDeTai"])) {
    $dataMaDeTai = $data["dataMaDeTai"];
}
if (isset($data["thongKeByKhoa"])) {
    $thongkeByKhoa = $data["thongKeByKhoa"];
}
if (isset($data["thongKeByTypeArticle"])) {
    $thongKeByTypeArticle = $data["thongKeByTypeArticle"];
}
if (isset($data["banner"])) {
    $banner = $data["banner"];
}
if (isset($data["bannerId"])) {
    $bannerId = $data["bannerId"];
}
//document
if (isset($data["listDocuments"])) {
    $listDocuments = $data["listDocuments"];
}
if (isset($data["documentDetai"])) {
    $documentDetai = $data["documentDetai"];
}
//thống kê
if (isset($data["totalStudent"])) {
    $totalStudent = $data["totalStudent"];
}
if (isset($data["totalArticle"])) {
    $totalArticle = $data["totalArticle"];
}
if (isset($data["totalArticleXLKha"])) {
    $deTaiKha = $data["totalArticleXLKha"];
}
if (isset($data["listyear"])) {
    $listyear = $data["listyear"];
}
if (isset($data["dataDepartments"])) {
    $dataDepartments = $data["dataDepartments"];
}

?>
<?php include "app/Views/Block/admin/headerAd.php" ?>
<?php include "app/Views/Block/" . $data['page'] . ".php" ?>
<?php include "app/Views/Block/admin/footerAd.php" ?>