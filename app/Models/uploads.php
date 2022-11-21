<?php
class uploads extends DB
{

    function uploads_images()
    {
        if (isset($_POST['uploads'])) {
            $fileName = $_FILES['fileUploads'];
            $extension = pathinfo($fileName['name'], PATHINFO_EXTENSION);
            $newFile = $this->getFileName();
            $allowed = ['png', 'jpg', 'jpeg'];
            if (in_array($extension, $allowed)) {
                move_uploaded_file($fileName['tmp_name'], './Uploads/Images/' . $newFile);
                $sql = "INSERT INTO uploadsimages (image_name) values ('$newFile')";
                $this->execute($sql);
                $_SESSION['status'] = "Uploads ảnh thành công !";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "File Uploads không đúng định dạng !";
                $_SESSION['status_code'] = "error";
            }
        }
    }
}