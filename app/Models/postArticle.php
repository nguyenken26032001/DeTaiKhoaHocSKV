<?php
class postArticle extends DB
{

    function addPostArticle()
    {
        $check = 0;
        if (isset($_POST["postArticle"])) {
            $action = $_POST['loai_tin'];
            $maDeTai = $_POST['maDeTai'];
            $tieuDe = $_POST['title'];
            $noiDung = $_POST['content'];
            $moTa = $_POST['moTa'];
            $khoaChuTri = $_POST['khoaChuTri'];
            //check  bai dang exist
            if ($action == "deTai") {
                $data = $this->checkExitsArticle($maDeTai);
                if (!empty($data) && count($data) > 0) {
                    $_SESSION["status"] = "Đăng bài đã tồn tại";
                    $_SESSION["status_code"] = "warning";
                    $check = 0;
                } else {
                    $data = $this->getArticleName_FileBaoCao_ById($maDeTai);
                    $name = $data[0]['tenDeTai'];
                    $fileBaoCao = $data[0]['fileBaoCao'];
                    $extension = pathinfo($_FILES["fileUploads"]['name'], PATHINFO_EXTENSION);
                    $allowed = ['png', 'jpg', 'jpeg'];
                    $fileupload = $this->getFileName();
                    if (in_array($extension, $allowed)) {
                        move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/PostArticle/' . $fileupload);
                        $sql = "INSERT INTO postdetai(maDeTai,tenDeTai,khoaChuTri,tieuDe, noiDung, hinhAnh,moTa,fileBaoCao) VALUES(
                            '$maDeTai','$name','$khoaChuTri', '$tieuDe', '$noiDung', '$fileupload','$moTa','$fileBaoCao')";
                        $this->execute($sql);
                        $_SESSION["status"] = "Đăng bài thành công";
                        $_SESSION["status_code"] = "success";
                        $check = 1;
                    } else {
                        $_SESSION["status"] = "File đính kèm không phải là hình ảnh vui lòng kiểm tra ";
                        $_SESSION["status_code"] = "error";
                        $check = 0;
                    }
                }
            } else {
                $extension = pathinfo($_FILES["fileUploads"]['name'], PATHINFO_EXTENSION);
                $allowed = ['png', 'jpg', 'jpeg'];
                $fileupload = $this->getFileName();
                if (in_array($extension, $allowed)) {
                    move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/PostNews/' . $fileupload);
                    $sql = "INSERT INTO news(tieuDe,noiDung,hinhAnh,moTa) VALUES('$tieuDe','$noiDung','$fileupload','$moTa')";
                    $this->execute($sql);
                    $_SESSION["status"] = "Đăng tin thành công";
                    $_SESSION["status_code"] = "success";
                    $check = 2;
                } else {
                    $_SESSION["status"] = "File đính kèm không phải là hình ảnh vui lòng kiểm tra ";
                    $_SESSION["status_code"] = "error";
                    $check = 0;
                }
            }
        }
        return $check;
    }
    function updatePostArticle()
    {
        $value = 0;
        if (isset($_POST['updatePostArticle'])) {
            $maDeTai = $_POST['maDeTai'];
            $tieuDe = $_POST['title'];
            $noiDung = $_POST['content'];
            $image = $_FILES['fileUploads']['name'];
            $moTa = $_POST['moTa'];
            $oldImage = $_POST["oldImage"];
            $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
            $allowed = ['png', 'jpg', 'jpeg'];
            $imageNew = $this->getFileName();
            if (!empty($image)) {
                if (in_array($extension, $allowed)) {
                    move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/PostArticle/' . $imageNew);
                    $sql = "UPDATE postdetai SET tieuDe='$tieuDe', noiDung='$noiDung', hinhAnh='$imageNew',moTa='$moTa' WHERE maDeTai='$maDeTai'";
                    $this->execute($sql);
                    $_SESSION["status"] = "Cập nhật bài đăng thành công!";
                    $_SESSION["status_code"] = "success";
                    unlink('./Uploads/PostArticle/' . $oldImage);
                    $value = 1;
                } else {
                    $_SESSION["status"] = "File ảnh không đúng định dạng vui lòng kiểm tra lại";
                    $_SESSION["status_code"] = "error";
                    $value = 0;
                }
            } else {
                $sql = "UPDATE postdetai SET tieuDe='$tieuDe', noiDung='$noiDung',moTa='$moTa' WHERE maDeTai='$maDeTai'";
                $this->execute($sql);
                $_SESSION["status"] = "Cập nhật bài đăng thành công!";
                $_SESSION["status_code"] = "success";
                $value = 1;
            }
        }
        return $value;
    }
    function checkExitsArticle($maDeTai)
    {
        $sql = "SELECT maDeTai FROM postdetai WHERE maDeTai ='$maDeTai'";
        return $this->executeResult($sql);
    }
    function getListPost($firstIndex, $limit)
    {
        $sql = "SELECT * FROM postdetai limit $firstIndex,$limit";
        return $this->executeResult($sql);
    }
    function getListPostForAdmin()
    {
        $sql = "SELECT * FROM postdetai";
        return $this->executeResult($sql);
    }
    function getCountPost()
    {
        $sql = "SELECT count(maDeTai) as 'number' from postdetai";
        return $this->executeResult($sql);
    }
    function getDataSearch($search_content)
    {
        $data = [];
        $sql = "SELECT postdetai.maDeTai as'maDeTai', postdetai.tieuDe as'tieuDe',postdetai.noiDung as 'noiDung', postdetai.hinhAnh as 'hinhAnh'
            FROM postdetai,giaovienhd WHERE postdetai.maDeTai= giaovienhd.maDeTai and postdetai.tenDeTai  like  '% $search_content%'";
        $data = $this->executeResult($sql);
        if (empty($data) && count($data) <= 0) {
            $sql1 = "SELECT postdetai.maDeTai as'maDeTai', postdetai.tieuDe as'tieuDe',postdetai.noiDung as 'noiDung', postdetai.hinhAnh as 'hinhAnh'
            FROM postdetai,giaovienhd WHERE postdetai.maDeTai= giaovienhd.maDeTai and giaovienhd.hoTen like '%" . $search_content . "%'";
            $data = $this->executeResult($sql1);
        }
        return $data;
    }

    function getListPostById($maDeTai)
    {
        $sql = "SELECT * FROM postdetai WHERE maDeTai ='$maDeTai'";
        return $this->executeResult($sql);
    }
    function getImageById($maDeTai)
    {
        $sql = "SELECT hinhAnh FROM postdetai WHERE maDeTai ='$maDeTai'";
        return $this->executeResult($sql);
    }
    function delPost()
    {
        if (isset($_POST["maDeTai"])) {
            $maDeTai = $_POST['maDeTai'];
            $Image = $this->getImageById($maDeTai);
            $sql = "DELETE FROM postdetai WHERE maDeTai = '$maDeTai'";
            $this->execute($sql);
            unlink('./Upload/PostArticle/' . $Image . '');
            $_SESSION["status"] = "Xóa bài thành công";
            $_SESSION["status_code"] = "success";
        }
    }
    function getListPostByDerpartment($maKhoa, $firstIndex, $limit)
    {
        $sql = "SELECT * FROM postdetai WHERE khoaChuTri = '$maKhoa' limit $firstIndex,$limit";
        $data = $this->executeResult($sql);
        if (empty($data)) {
            $_SESSION["status"] = "Khoa bạn tìm kiếm chưa có đề tài nào !";
            $_SESSION["status_code"] = "warning";
        }
        return $data;
    }
    function getNumberPostByDerpartment($maKhoa)
    {
        $sql = "SELECT  count(khoaChuTri) as 'number' FROM postdetai WHERE khoaChuTri ='$maKhoa'";
        $data = $this->executeResult($sql);
        return $data;
    }
    function getArticleName_FileBaoCao_ById($maDeTai)
    {
        $sql = "SELECT tenDeTai,fileBaoCao FROM detai WHERE maDeTai = '$maDeTai'";
        return $this->executeResult($sql);
    }
}