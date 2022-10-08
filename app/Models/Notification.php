<?php
class  Notification extends DB
{
    function add_notification()
    {
        if (isset($_POST['addNoti'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $title = $_POST['title'];
            $content = $_POST['content'];
            $ngayDang = date('Y-m-d');
            $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
            $allowed = ['png', 'jpg', 'jpeg', 'gif', 'ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx'];
            $fileDinhKem = $this->changeTitle($_FILES['fileUploads']['name']);
            if (in_array($extension, $allowed)) {
                move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/FileNotification/' . $fileDinhKem);
                $sqlInsert = "INSERT INTO thongbao (tieuDe,noiDung,fileDinhKem,ngayDang)
                values('$title','$content','$fileDinhKem','$ngayDang')";
                $this->execute($sqlInsert);
                $_SESSION['status'] = "Đăng bài thành công !";
                $_SESSION['status_code'] = "success";
            }
        }
    }
    function getList()
    {
        $sql = "SELECT * FROM thongbao";
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
        unlink('"' . _WEB_ROOT_ . '"/Uploads/FileNotification/' . $fileName[0]['fileDinhKem'] . '');
        $_SESSION['status'] = "Xóa thông báo thành công !";
        $_SESSION['status_code'] = "success";
    }
    function update_notification()
    {
        if (isset($_POST['updateNoti'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $file = $_FILES['fileUploads']['name'];
            $file_old = $_POST['file_old'];
            if (!empty($file)) {
                $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
                $allowed = ['png', 'jpg', 'jpeg', 'gif', 'ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx'];
                if (in_array($extension, $allowed)) {
                    $fileDinhKem = $this->changeTitle($_FILES['fileUploads']['name']);
                    move_uploaded_file($_FILES['fileUploads']['tmp_name'], '"' . _WEB_ROOT_ . '"/Uploads/FileNotification/' . $fileDinhKem);
                    $sql = "UPDATE thongbao SET tieuDe='$title', noiDung='$content', fileDinhKem='$fileDinhKem' where id='$id'";
                    $this->execute($sql);
                    unlink('"' . _WEB_ROOT_ . '"/Uploads/FileNotification/' . $file_old);
                    $_SESSION['status'] = "Cập nhật thông báo thành công !";
                    $_SESSION['status_code'] = "success";
                } else {
                    $_SESSION['status'] = "Định dạng file không được upload !";
                    $_SESSION['status_code'] = "error";
                }
            } else {
                $sql = "UPDATE thongbao SET tieuDe='$title', noiDung='$content' where id='$id'";
                $this->execute($sql);
                $_SESSION['status'] = "Cập nhật thông báo thành công !";
                $_SESSION['status_code'] = "success";
            }
        }
    }
}
