<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class import extends controller
{
    public function importData()
    {
        if (isset($_POST['import'])) {
            $file_name = $_FILES['file_import']['name'];
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed = ['xlsx'];
            if (in_array($extension, $allowed)) {
                move_uploaded_file($_FILES['file_import']['tmp_name'], './Uploads/FileImport/' . $file_name);
                //!red file 
                $file = './Uploads/FileImport/' . $file_name;
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                $data = $spreadsheet->getActiveSheet()->toArray();

                try {
                    $count = "0";
                    foreach ($data as $row) {
                        if ($count > 0) {
                            $malop = $row['0'];
                            $maKhoa = $row['1'];
                            $heDaoTao = $row['2'];
                            $nienKhoa = $row['3'];
                            $isExistClass = $this->Model("lop")->isExistClass($malop, $maKhoa);
                            if ($isExistClass[0]['number'] == 0) {
                                $this->Model('lop')->addListClassByImportFile($malop, $maKhoa, $heDaoTao, $nienKhoa);
                                $_SESSION['status'] = "File import dữ liệu thành công ";
                                $_SESSION['status_code'] = "success";
                                header("location: " . _WEB_ROOT_ . "/Admin/addClassPage");
                            } else {
                                $_SESSION['status'] = "Một số lớp đã tồn tại trong hệ thống ";
                                $_SESSION['status_code'] = "error";
                                header("location: " . _WEB_ROOT_ . "/Admin/addClassPage");
                            }
                        } else {
                            $count = "1";
                        }
                    }
                    unlink('./Uploads/FileImport/' . $file_name);
                } catch (Exception $ex) {
                    $_SESSION['status'] = $ex->getMessage() . "Uploads thất bại";
                    $_SESSION['status_code'] = "error";
                    header("location: " . _WEB_ROOT_ . "/Admin/addClassPage");
                }
            } else {
                $_SESSION['status'] = "File import không đúng định dạng vui lòng kiểm tra lại";
                $_SESSION['status_code'] = "error";
                header("location: " . _WEB_ROOT_ . "/Admin/addClassPage");
            }
        }
    }
}