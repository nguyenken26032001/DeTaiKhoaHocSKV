<?php
class news extends DB
{
    function getList()
    {
        $sql = "SELECT * FROM news";
        return $this->executeResult($sql);
    }
    function getNewById($id)
    {
        $sql = "SELECT * FROM news WHERE id= '$id'";
        return $this->executeResult($sql);
    }
    function getNewsLimit($firstIndex, $limit)
    {
        $sql = "SELECT * FROM news  limit $firstIndex, $limit";
        return $this->executeResult($sql);
    }
    function getDataSearch($search_content)
    {
        $sql = "SELECT * FROM news WHERE tieuDe like '%" . $search_content . "%' ";
        return $this->executeResult($sql);
    }
    function getNumberPost()
    {
        $sql = "SELECT COUNT(id) as 'numberNews' FROM news ";
        return $this->executeResult($sql);
    }
    function updateNew()
    {
        $value = 0;
        if (isset($_POST['updateNew'])) {
            $maTinTuc = $_POST['maTinTuc'];
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
                    move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/PostNews/' . $imageNew);
                    $sql = "UPDATE news SET tieuDe='$tieuDe', noiDung='$noiDung', hinhAnh='$imageNew',moTa='$moTa' WHERE id='$maTinTuc'";
                    $this->execute($sql);
                    $_SESSION["status"] = "Cập nhật bài đăng thành công!";
                    $_SESSION["status_code"] = "success";
                    unlink('./Uploads/PostNews/' . $oldImage);
                    $value = 1;
                } else {
                    $_SESSION["status"] = "File ảnh không đúng định dạng vui lòng kiểm tra lại";
                    $_SESSION["status_code"] = "error";
                    $value = 0;
                }
            } else {
                $sql = "UPDATE news SET tieuDe='$tieuDe', noiDung='$noiDung',moTa='$moTa' WHERE id='$maTinTuc'";
                $this->execute($sql);
                $_SESSION["status"] = "Cập nhật bài đăng thành công!";
                $_SESSION["status_code"] = "success";
                $value = 1;
            }
        }
        return $value;
    }
    function delNew()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM news WHERE id='$id'";
            $this->execute($sql);
            $_SESSION['status'] = 'Xóa bài đăng thành công !';
            $_SESSION['status_code'] = "success";
        }
    }
}