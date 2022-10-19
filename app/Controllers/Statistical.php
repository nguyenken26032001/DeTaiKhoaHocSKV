<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer\SpContainer;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;

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
                echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\">Xuất Excel</button>";
            }
        }
    }
    function StatisticalByDeparmentDetail()
    {
        if (isset($_POST)) {
            $department = $_POST['department'];
            $option = $_POST['option'];
            if ($option == "khoa") {
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

        ]);
    }
    function statisticalByYear()
    {
        if (isset($_POST)) {
            $year = $_POST['year'];
            $option = $_POST['option'];
            if ($option == 'year') {
                $data = $this->Model('thongke')->getArticleByYear($year);
                echo "<table  class='table px-5'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>TT</th>";
                echo "<th style='width:100px' >Mã đề tài</th>";
                echo "<th>Tên đề tài</th>";
                echo "<th  style='width:200px'>Giáo viên HD</th>";
                echo "<th  style='width:100px'>Xếp loại</th>";
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
                    <td>' . $item['xepLoai'] . '</td>
                    </tr>';
                }
                echo "</tbody>";
                echo "</table>";
                echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\">Xuất Excel</button>";
            }
        }
    }
    function StatisticalByType()
    {
        if (isset($_POST)) {
            $type = $_POST["type"];
            $option = $_POST["option"];
            if ($option == "Type") {
                $data = $this->Model("thongke")->getArticleByType($type);
                if ($data == null) {
                    echo 0;
                } else {
                    echo "<table  class='table px-5'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>TT</th>";
                    echo "<th  style='width:100px'>Mã đề tài</th>";
                    echo "<th>Tên đề tài</th>";
                    echo "<th  style='width:200px'>Giáo viên HD</th>";
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
                    echo  "<button id=\"btnExcel\" class=\"btn btn-success float-right mr-5 mt-4\">Xuất Excel</button>";
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
            header('Content-Disposition: attactment; filename="data.xlsx"');
            $writer->save('php://output');
        }
    }
}