<?php
class taiLieu extends DB
{
    function addDocument()
    {
        if (isset($_POST["addDocument"])) {
            $descDoc = $_POST['decsDoc'];
            $files = $_FILES['fileUploads']['name'];
            $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'pdf'];
            $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
            $newFile = $this->getFileName();
            if (in_array($extension, $allowed)) {
                move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/FileTaiLieu/' . $newFile);
                $sql = "INSERT INTO tailieu(tenFile,fileTaiLieu) VALUES('$descDoc','$newFile')";
                $this->execute($sql);
                $_SESSION['status'] = "Thêm tài liệu thành công.";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "File Upload không đúng định dạng vui lòng kiểm tra lại";
                $_SESSION['status_code'] = "error";
            }
        }
    }
    function update()
    {
        $value = 0;
        if (isset($_POST['updateDocument'])) {
            $id = $_POST['id'];
            $decsDoc = $_POST['decsDoc'];
            $file = $_FILES['fileUploads']['name'];
            $file_old = $_POST['file_Old'];
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx'];
            $newFile = $this->getFileName();
            if (!empty($file)) {
                if (in_array($extension, $allowed)) {
                    move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/FileTaiLieu/' . $newFile);
                    $sql = "UPDATE tailieu SET tenFile='$decsDoc', fileTaiLieu='$newFile'WHERE id = '$id'";
                    $this->execute($sql);
                    unlink('./Uploads/FileTaiLieu/' . $file_old . '');
                    $_SESSION['status'] = "Cập nhật tài liệu thành công";
                    $_SESSION['status_code'] = "success";
                    $value = 1;
                } else {
                    $_SESSION['status'] = "File Upload không đúng định dạng";
                    $_SESSION['status_code'] = "warning";
                    $value = 0;
                }
            } else {
                $sql = "UPDATE tailieu SET tenFile='$decsDoc' WHERE id = '$id'";
                $this->execute($sql);
                $_SESSION['status'] = "Cập nhật tài liệu thành công";
                $_SESSION['status_code'] = "success";
                $value = 1;
            }
        }
        return $value;
    }
    function getListDocuments()
    {
        $sql = "SELECT * FROM tailieu";
        return $this->executeResult($sql);
    }
    function getDocumentById($id)
    {
        $sql = "SELECT * FROM tailieu WHERE id = '$id'";
        return  $this->executeResult($sql);
    }
    function getFileById($id)
    {
        $sql = "SELECT fileTaiLieu FROM tailieu WHERE id = '$id'";
        return $this->executeResult($sql);
    }

    function deleteDocument($id)
    {
        $sql = "DELETE FROM tailieu WHERE id ='$id'";
        $this->execute($sql);
        $fileName = $this->getFileById($id);
        unlink('./Uploads/FileTaiLieu/' . $fileName[0]['fileTaiLieu'] . '');
        $_SESSION['status'] = "xóa tài liệu thành công";
        $_SESSION['status_code'] = "success";
    }
}
