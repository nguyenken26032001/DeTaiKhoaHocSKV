<?php
class import extends controller
{
    public function importData()
    {
        if (isset($_POST['import'])) {
            $file_name = $_FILES['file_import']['name'];
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed = ['xlsx', 'doc'];
            if (in_array($extension, $allowed)) {
                move_uploaded_file($_FILES['file_import']['tmp_name'], './Uploads/' . $file_name);
                //!red file 
                $file = './Uploads/' . $file_name;
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
                        $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }
                }
                // $_SESSION['status'] = "File import dữ liệu thành công ";
                // $_SESSION['status_code'] = "success";
                // header("location: " . _WEB_ROOT_ . "/Admin/addClassPage");
            } else {
                $_SESSION['status'] = "File import không đúng định dạng vui lòng kiểm tra lại";
                $_SESSION['status_code'] = "warning";
                header("location: " . _WEB_ROOT_ . "/Admin/addClassPage");
            }
        }
    }
}
