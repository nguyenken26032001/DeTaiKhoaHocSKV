<?php
class banner extends DB
{
    function getbanner()
    {
        $sql = "SELECT * FROM banner";
        return $this->executeResult($sql);
    }
    function getbannerById($id)
    {
        $sql  = "SELECT * FROM banner WHERE id = '$id'";
        return  $this->executeResult($sql);
    }
    function updateBannerId()
    {
        $value = 0;
        if (isset($_POST['updateBanner'])) {
            $id = $_POST['idBanner'];
            $fileName = $_FILES['fileUpdateBanner'];
            $oldImage = $_POST['oldImage'];
            $extension = pathinfo($fileName['name'], PATHINFO_EXTENSION);
            $newFile = $this->changeTitle($fileName['name']);
            $allowed = ['png', 'jpg', 'jpeg'];
            if (in_array($extension, $allowed)) {
                move_uploaded_file($fileName['tmp_name'], './Uploads/Banner/' . $newFile);
                $sql = "UPDATE banner SET hinhAnh='$newFile' where id = '$id'";
                $this->execute($sql);
                unlink('./Uploads/Banner/' . $oldImage . '');
                $_SESSION['status'] = "Cập nhật ảnh thành công !";
                $_SESSION['status_code'] = "success";
                $value = 1;
            } else {
                $_SESSION['status'] = "File ảnh không đúng định dạng vui lòng kiểm tra!";
                $_SESSION['status_code'] = "warning";
                $value = 0;
            }
        }
        return $value;
    }
}
