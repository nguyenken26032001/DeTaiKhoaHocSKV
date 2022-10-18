<?php
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
                $objfile = PHPExcel_IOFactory::identify($file);
                $objdata = PHPExcel_IOFactory::createReader($objfile);
                $objPHPExcel = $objdata->load($file);
                $sheet = $objPHPExcel->setActiveSheetIndex(0);
                $totalRows = $sheet->getHighestRow();
                $lastColumn = $sheet->getHighestColumn();
                $totalColumn = PHPExcel_Cell::columnIndexFromString($lastColumn);
                $data = [];
                for ($i = 2; $i < $totalRows; $i++) {
                    for ($j = 0; $j < $totalColumn; $j++) {
                        $value = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                        if (!empty($value)) {
                            $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                        }
                    }
                }
                try {
                    foreach ($data as $item) {
                        $malop = $item[1];
                        $maKhoa = $item[2];
                        $heDaoTao = $item[3];
                        $nienKhoa = $item[4];
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
                    }
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