<?php
class  Notification extends DB
{
    function add_notification()
    {
        $value = 0;
        if (isset($_POST['addNoti'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $title = $_POST['title'];
            $content = $_POST['content'];
            $ngayDang = date('Y-m-d');
            $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
            $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx'];
            $fileDinhKem = $this->getFileName();
            if (in_array($extension, $allowed)) {
                move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/FileNotification/' . $fileDinhKem);
                $sqlInsert = "INSERT INTO thongbao (tieuDe,noiDung,fileDinhKem,ngayDang)
                values('$title','$content','$fileDinhKem','$ngayDang')";
                $this->execute($sqlInsert);
                $_SESSION['status'] = "Đăng bài thành công !";
                $_SESSION['status_code'] = "success";
                $value = 1;
            } else {
                $_SESSION['status'] = "Định dạng file này không được Uploads";
                $_SESSION['status_code'] = "error";
                $value = 0;
            }
        }
        return $value;
    }
    function getList()
    {
        $sql = "SELECT * FROM thongbao  ORDER BY ngayDang DESC LIMIT 5 ";
        return $this->executeResult($sql);
    }
    function getListByID($maThongBao)
    {
        $sql = "SELECT * FROM thongbao where id='$maThongBao'";
        return $this->executeResult($sql);
    }
    function getFileNameById($id)
    {
        $sql = "SELECT fileDinhKem FROM thongbao WHERE id='$id'";
        return $this->executeResult($sql);
    }
    function DelNotification()
    {
        $id = $_POST['id'];
        $fileName = $this->getFileNameById($id);
        $sql = "DELETE from thongbao where id='$id'";
        $this->execute($sql);
        unlink('./Uploads/FileNotification/' . $fileName[0]['fileDinhKem'] . '');
        $_SESSION['status'] = "Xóa thông báo thành công !";
        $_SESSION['status_code'] = "success";
    }
    function update_notification()
    {
        $value = 0;
        if (isset($_POST['updateNoti'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $file = $_FILES['fileUploads']['name'];
            $file_old = $_POST['file_old'];
            if (!empty($file)) {
                $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
                $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx'];
                if (in_array($extension, $allowed)) {
                    $fileDinhKem = $this->getFileName();
                    move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/FileNotification/' . $fileDinhKem);
                    $sql = "UPDATE thongbao SET tieuDe='$title', noiDung='$content', fileDinhKem='$fileDinhKem' where id='$id'";
                    $this->execute($sql);
                    unlink('./Uploads/FileNotification/' . $file_old . '');
                    $_SESSION['status'] = "Cập nhật thông báo thành công !";
                    $_SESSION['status_code'] = "success";
                    $value = 1;
                } else {
                    $_SESSION['status'] = "Định dạng file không được upload !";
                    $_SESSION['status_code'] = "error";
                    $value = 0;
                }
            } else {
                $sql = "UPDATE thongbao SET tieuDe='$title', noiDung='$content' where id='$id'";
                $this->execute($sql);
                $_SESSION['status'] = "Cập nhật thông báo thành công !";
                $_SESSION['status_code'] = "success";
                $value = 1;
            }
        }
        return $value;
    }
}