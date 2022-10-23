<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Statistical extends controller
{
    function statistical_By_Derpartment()
    {
        if (isset($_POST)) {
            $value = $_POST['value'];
            if ($value == "khoa") {
                $data = $this->Model("thongke")->statistical_By_Derpartment();
                echo "<table  class='table px-5'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>TT</th>";
                echo "<th>Khoa</th>";
                echo "<th>Số đề tài</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $index = 0;
                foreach ($data as $item) {
                    echo '
                    <tr>
                    <td>' . ++$index . '</td>
                    <td>' . $item['tenkhoa'] . '</td>
                    <td>' . $item['soluong'] . '</td>
                    </tr>';
                }
                echo "</tbody>";
                echo "</table>";
                echo "<form action=\"" . _WEB_ROOT_ . "/Statistical/ExportByDepartments/\" method=\"post\">";
                echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\" name=\"export\">Xuất Excel</button>";
                echo "</form>";
            }
        }
    }
    function StatisticalByDeparmentDetail()
    {
        if (isset($_POST)) {
            $department = $_POST['department'];
            $data = $this->Model("thongke")->getArticleByDepartmentDetail($department);
            if ($data == null) {
                echo 0;
            } else {
                echo "<table  class='table px-5'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>TT</th>";
                echo "<th style='width:100px'>Mã đề tài</th>";
                echo "<th>Tên đề tài</th>";
                echo "<th style='width:200px'>Giáo viên HD</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $index = 0;
                foreach ($data as $item) {
                    echo '
                    <tr>
                    <td>' . ++$index . '</td>
                    <td>' . $item['maDeTai'] . '</td>
                    <td>' . $item['tenDeTai'] . '</td>
                    <td>' . $item['gvhd'] . '</td>
                    </tr>';
                }
                echo "</tbody>";
                echo "</table>";
                echo "<form action=\"" . _WEB_ROOT_ . "/Statistical/ExportByDepartment/" . $department . "\" method=\"post\">";
                echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\" name=\"export\">Xuất Excel</button>";
                echo "</form>";
            }
        }
    }
    function Thongketheotieuchi()
    {
        $listyear = $this->Model('thongke')->getListyear();
        $dataDepartments = $this->Model("DepartmentModel")->getList();
        $this->view("masters", [
            "page" => "admin/StatisticalDetail",
            "Action" => "6",
            "listyear" => $listyear,
            "dataDepartments" => $dataDepartments,
            "js" => "statistical.js"

        ]);
    }
    function statisticalByYear()
    {
        if (isset($_POST)) {
            $year = $_POST['year'];
            $type = $_POST['type'];
            if ($type == "null") {
                $data = $this->Model('thongke')->getArticleByYear($year);
                echo "<table  class='table px-5'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>TT</th>";
                echo "<th style='width:100px' >Mã đề tài</th>";
                echo "<th>Tên đề tài</th>";
                echo "<th  style='width:200px'>Ngày giao</th>";
                echo "<th  style='width:200px'>Ngày nghiệm thu</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $index = 0;
                foreach ($data as $item) {
                    echo '
                    <tr>
                    <td>' . ++$index . '</td>
                    <td>' . $item['maDeTai'] . '</td>
                    <td>' . $item['tenDeTai'] . '</td>
                    <td>' . $this->analysis_Date($item, 'ngayGiao') . '</td>
                    <td>' . $this->analysis_Date($item, 'ngayNghiemThu') . '</td>
                    </tr>';
                }
                echo "</tbody>";
                echo "</table>";
                echo "<form action=\"" . _WEB_ROOT_ . "/Statistical/ExportByYear/" . $year . "\" method=\"post\">";
                echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\" name=\"export\">Xuất Excel</button>";
                echo "</form>";
            } else {
                //handle if has type 
                $data1 = $this->Model("thongke")->getArticleByTypeYear($type, $year);
                if (empty($data1)) {
                    echo 0;
                } else {
                    echo "<table  class='table px-5'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>TT</th>";
                    echo "<th  style='width:100px'>Mã đề tài</th>";
                    echo "<th>Tên đề tài</th>";
                    echo "<th  style='width:200px'>Ngày giao</th>";
                    echo "<th  style='width:200px'>Ngày nghiệm thu</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $index = 0;
                    foreach ($data1 as $item) {
                        echo '
                    <tr>
                    <td>' . ++$index . '</td>
                    <td>' . $item['maDeTai'] . '</td>
                    <td>' . $item['tenDeTai'] . '</td>
                    <td>' . $this->analysis_Date($item, 'ngayGiao') . '</td>
                    <td>' . $this->analysis_Date($item, 'ngayNghiemThu') . '</td>
                    </tr>';
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<form action=\"" . _WEB_ROOT_ . "/Statistical/ExportByTypeOfYear/" . $type . "/" . $year . "\" method=\"post\">";
                    echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\" name=\"export\">Xuất Excel</button>";
                    echo "</form>";
                }
            }
        }
    }
    function StatisticalByType()
    {
        if (isset($_POST)) {
            $type = $_POST["type"];
            $year = $_POST['year'];
            $data = $this->Model("thongke")->getArticleByType($type);
            if ($year == "null") {
                if ($data == null) {
                    echo 0;
                } else {
                    echo "<table  class='table px-5'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>TT</th>";
                    echo "<th  style='width:100px'>Mã đề tài</th>";
                    echo "<th>Tên đề tài</th>";
                    echo "<th  style='width:200px'>Ngày giao</th>";
                    echo "<th  style='width:200px'>Ngày nghiệm thu</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $index = 0;
                    foreach ($data as $item) {
                        echo '
                        <tr>
                        <td>' . ++$index . '</td>
                        <td>' . $item['maDeTai'] . '</td>
                        <td>' . $item['tenDeTai'] . '</td>
                        <td>' . $this->analysis_Date($item, 'ngayGiao') . '</td>
                        <td>' . $this->analysis_Date($item, 'ngayNghiemThu') . '</td>
                        </tr>';
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<form action=\"" . _WEB_ROOT_ . "/Statistical/ExportByType/" . $type . "\" method=\"post\">";
                    echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\" name=\"export\">Xuất Excel</button>";
                    echo "</form>";
                }
            } else {
                //hander
                $data1 = $this->Model("thongke")->getArticleByTypeYear($type, $year);
                if (empty($data1)) {
                    echo 0;
                } else {
                    echo "<table  class='table px-5'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>TT</th>";
                    echo "<th  style='width:100px'>Mã đề tài</th>";
                    echo "<th>Tên đề tài</th>";
                    echo "<th  style='width:200px'>Ngày giao</th>";
                    echo "<th  style='width:200px'>Ngày nghiệm thu</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $index = 0;
                    foreach ($data1 as $item) {
                        echo '
                    <tr>
                    <td>' . ++$index . '</td>
                    <td>' . $item['maDeTai'] . '</td>
                    <td>' . $item['tenDeTai'] . '</td>
                    <td>' . $this->analysis_Date($item, 'ngayGiao') . '</td>
                    <td>' . $this->analysis_Date($item, 'ngayNghiemThu') . '</td>
                    </tr>';
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<form action=\"" . _WEB_ROOT_ . "/Statistical/ExportByTypeOfYear/" . $type . "/" . $year . "\" method=\"post\">";
                    echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\" name=\"export\">Xuất Excel</button>";
                    echo "</form>";
                }
            }
        }
    }
    //handle export data
    function ExportByDepartment($department)
    {
        if (isset($_POST['export'])) {

            $data = $this->Model("thongke")->getArticleByDepartmentDetail($department);
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $writer = new Xlsx($spreadsheet);
            $rowCount = 1;
            $sheet->setCellValue('A' . $rowCount, 'Mã đề tài');
            $sheet->setCellValue('B' . $rowCount, 'Tên đề tài');
            $sheet->setCellValue('C' . $rowCount, 'Giáo  viên hướng dẫn');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['gvhd']);
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="thong-ke-de-tai-khoa-' . $department . '.xlsx"');
            $writer->save('php://output');
        }
    }
    function ExportByDepartments()
    {
        if (isset($_POST['export'])) {

            $data = $this->Model("thongke")->statistical_By_Derpartment();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $writer = new Xlsx($spreadsheet);
            $rowCount = 1;
            $sheet->setCellValue('A' . $rowCount, 'Tên Khoa');
            $sheet->setCellValue('B' . $rowCount, 'Số Lượng');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['tenkhoa']);
                $sheet->setCellValue('B' . $rowCount, $row['soluong']);
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="thong-Ke-de-tai-tat-ca-khoa.xlsx"');
            $writer->save('php://output');
        }
    }
    function ExportByYear($year)
    {
        if (isset($_POST['export'])) {

            $data = $this->Model("thongke")->getArticleByYear($year);
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $writer = new Xlsx($spreadsheet);
            $rowCount = 2;
            $sheet->setCellValue('A1', 'danh sách đề tài trong năm' . $year);
            $sheet->setCellValue('A' . $rowCount, 'Mã đề tài');
            $sheet->setCellValue('B' . $rowCount, 'Tên đề tài');
            $sheet->setCellValue('C' . $rowCount, 'Ngày giao');
            $sheet->setCellValue('D' . $rowCount, 'Ngày nghiệm thu');
            $sheet->setCellValue('E' . $rowCount, 'Xếp loại');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['ngayGiao']);
                $sheet->setCellValue('D' . $rowCount, $row['ngayNghiemThu']);
                $sheet->setCellValue('E' . $rowCount, $row['xepLoai']);
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="Thong-ke-de-tai-nam-' . $year . '.xlsx"');
            $writer->save('php://output');
        }
    }
    function ExportByType($type)
    {
        if (isset($_POST['export'])) {

            $data = $this->Model("thongke")->getArticleByType($type);
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $writer = new Xlsx($spreadsheet);
            $rowCount = 2;
            $sheet->setCellValue('A1', 'Danh sách đề tài thuộc loại' . $type);
            $sheet->setCellValue('A' . $rowCount, 'Mã đề tài');
            $sheet->setCellValue('B' . $rowCount, 'Tên đề tài');
            $sheet->setCellValue('C' . $rowCount, 'Ngày giao đề tài');
            $sheet->setCellValue('C' . $rowCount, 'Ngày nghiệm thu');
            $sheet->setCellValue('D' . $rowCount, 'Loại đề tài');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['ngayGiao']);
                $sheet->setCellValue('D' . $rowCount, $row['ngayNghiemThu']);
                $sheet->setCellValue('E' . $rowCount, $type);
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="Thong-ke-theo-de-tai-loai-' . $type . '.xlsx"');
            $writer->save('php://output');
        }
    }
    function ExportByTypeOfYear($type, $year)
    {
        if (isset($_POST['export'])) {

            $data = $this->Model("thongke")->getArticleByTypeYear($type, $year);
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $writer = new Xlsx($spreadsheet);
            $rowCount = 2;
            $sheet->setCellValue('A1', 'Danh sách đề tài thuộc loại ' . $type . "vào năm: " . $year);
            $sheet->setCellValue('A' . $rowCount, 'Mã đề tài');
            $sheet->setCellValue('B' . $rowCount, 'Tên đề tài');
            $sheet->setCellValue('C' . $rowCount, 'Ngày giao đề tài');
            $sheet->setCellValue('D' . $rowCount, 'Ngày nghiệm thu');
            $sheet->setCellValue('E' . $rowCount, 'Loại đề tài');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['ngayGiao']);
                $sheet->setCellValue('D' . $rowCount, $row['ngayNghiemThu']);
                $sheet->setCellValue('E' . $rowCount, $type);
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="Thong-ke-de-tai-loai-' . $type . '-' . $year . '.xlsx"');
            $writer->save('php://output');
        }
    }
    function analysis_Date($item, $fieldName)
    {
        $time = strtotime($item[$fieldName]);
        $day = date('j', $time);
        $month = date('m', $time);
        $year = date('Y', $time);
        return $day . '/' . $month . '/' . $year;
    }
}