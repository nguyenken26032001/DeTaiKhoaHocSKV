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
                echo "<th>Số lượng đề tài nghiên cứu</th>";
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
                echo "<form action=\"" . _WEB_ROOT_ . "/Statistical/ExportByDepartments/\" method=\"post\" class=\"d-flex justify-content-end\" >";
                echo  "<button id=\"btnExcel\" class=\"btn btn-success mr-5 mt-2 mb-3\"  name=\"export\">Xuất Excel</button>";
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
                echo "<th style='width:200px'>Ngày giao</th>";
                echo "<th style='width:200px'>Ngày nghiệm thu</th>";
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
                    <td>' . $this->analysis_Date($item, 'thoiGianGiao') . '</td>
                    <td>' . $this->analysis_Date($item, 'thoiGianNghiemThu') . '</td>
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
                echo "<th style='width:100px,border-radius:10px' >Mã đề tài</th>";
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
                    echo "<th  style='width:100px,border-radius:10px'>Mã đề tài</th>";
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
            $rowCount = 8;
            $spreadsheet->getDefaultStyle()->getFont()->setName("Time new Roman");
            $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
            //set width for column
            $sheet->getColumnDimension('A')->setWidth(12);
            $sheet->getColumnDimension('B')->setWidth(45);
            $sheet->getColumnDimension('C')->setWidth(22);
            $sheet->getColumnDimension('D')->setWidth(20);
            $sheet->getColumnDimension('E')->setWidth(20);
            $sheet->getColumnDimension('F')->setWidth(12);


            $sheet->setCellValue("B2", "TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VINH");
            $sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
            $sheet->mergeCells("D2:E2");
            $sheet->setCellValue("D2", "Cộng hòa xã hội chủ nghĩa Việt Nam");
            $sheet->getStyle("D2:E2")->getFont()->setBold(true);
            $sheet->getStyle("D2:E2")->getAlignment()->setHorizontal('center');
            $sheet->setCellValue("B3", "Khoa " . $department);
            $sheet->getStyle("B3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("B3")->getFont()->setBold(true);
    
            $sheet->mergeCells("D3:E3");
            $sheet->setCellValue("D3", "Độc lập - tự do - hạnh phúc");
            $sheet->getStyle("D3:E3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("D3:E3")->getFont()->setUnderline(true);
            
            $sheet->mergeCells("C5:D5");
            $sheet->setCellValue("C5", "THỐNG KÊ THÔNG TIN CÁC ĐỀ TÀI NCKH ");
            $sheet->getStyle("C5:D5")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("C5:D5")->getFont()->setBold(true)->setSize(14);

            $sheet->setCellValue('A' . $rowCount, 'MÃ ĐỀ TÀI');
            $sheet->setCellValue('B' . $rowCount, 'TÊN ĐỀ TÀI');
            $sheet->setCellValue('C' . $rowCount, 'SINH VIÊN THỰC HIỆN');
            $sheet->setCellValue('D' . $rowCount, 'NGÀY GIAO');
            $sheet->setCellValue('E' . $rowCount, 'NGÀY NGHIỆM THU');
            $sheet->setCellValue('F' . $rowCount, 'XẾP LOẠI');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['hoTen']);
                $sheet->setCellValue('D' . $rowCount, $row['thoiGianGiao']);
                $sheet->setCellValue('E' . $rowCount, $row['thoiGianNghiemThu']);
                $sheet->setCellValue('F' . $rowCount, $row['xepLoai']);
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
            $rowCount = 8;
            $spreadsheet->getDefaultStyle()->getFont()->setName("Time new Roman");
            $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
            //set width for column
            $sheet->getColumnDimension('A')->setWidth(12);
            $sheet->getColumnDimension('B')->setWidth(45);
            $sheet->getColumnDimension('C')->setWidth(22);
            $sheet->getColumnDimension('D')->setWidth(28);
            $sheet->getColumnDimension('E')->setWidth(20);
            $sheet->getColumnDimension('F')->setWidth(12);


            $sheet->setCellValue("B2", "TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VINH");
            $sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
            $sheet->mergeCells("D2:E2");
            $sheet->setCellValue("D2", "Cộng hòa xã hội chủ nghĩa Việt Nam");
            $sheet->getStyle("D2:E2")->getFont()->setBold(true);
            $sheet->getStyle("D2:E2")->getAlignment()->setHorizontal('center');
            $sheet->setCellValue("B3", "Phòng Khoa học - hợp tác Quốc Tế");
            $sheet->getStyle("B3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("B3")->getFont()->setBold(true);
    
            $sheet->mergeCells("D3:E3");
            $sheet->setCellValue("D3", "Độc lập - tự do - hạnh phúc");
            $sheet->getStyle("D3:E3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("D3:E3")->getFont()->setUnderline(true);
            
            $sheet->mergeCells("C5:D5");
            $sheet->setCellValue("C5", "TỔNG HỢP DANH SÁCH ĐỀ TÀI TRONG NĂM ".$year);
            $sheet->getStyle("C5:D5")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("C5:D5")->getFont()->setBold(true)->setSize(14);

            $sheet->setCellValue('A' . $rowCount, 'MÃ ĐỀ TÀI');
            $sheet->setCellValue('B' . $rowCount, 'TÊN ĐỀ TÀI');
            $sheet->setCellValue('C' . $rowCount, 'SINH VIÊN THỰC HIỆN');
            $sheet->setCellValue('D' . $rowCount, 'NGÀY GIAO');
            $sheet->setCellValue('E' . $rowCount, 'NGÀY NGHIỆM THU');
            $sheet->setCellValue('F' . $rowCount, 'XẾP LOẠI');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['hoTen']);
                $sheet->setCellValue('D' . $rowCount, $row['ngayGiao']);
                $sheet->setCellValue('E' . $rowCount, $row['ngayNghiemThu']);
                $sheet->setCellValue('F' . $rowCount, $row['xepLoai']);
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
            $rowCount = 8;
            $spreadsheet->getDefaultStyle()->getFont()->setName("Time new Roman");
            $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
            //set width for column
            $sheet->getColumnDimension('A')->setWidth(12);
            $sheet->getColumnDimension('B')->setWidth(45);
            $sheet->getColumnDimension('C')->setWidth(22);
            $sheet->getColumnDimension('D')->setWidth(28);
            $sheet->getColumnDimension('E')->setWidth(20);
            $sheet->getColumnDimension('F')->setWidth(12);


            $sheet->setCellValue("B2", "TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VINH");
            $sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
            $sheet->mergeCells("D2:E2");
            $sheet->setCellValue("D2", "Cộng hòa xã hội chủ nghĩa Việt Nam");
            $sheet->getStyle("D2:E2")->getFont()->setBold(true);
            $sheet->getStyle("D2:E2")->getAlignment()->setHorizontal('center');
            $sheet->setCellValue("B3", "Phòng Khoa học - hợp tác Quốc Tế");
            $sheet->getStyle("B3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("B3")->getFont()->setBold(true);
    
            $sheet->mergeCells("D3:E3");
            $sheet->setCellValue("D3", "Độc lập - tự do - hạnh phúc");
            $sheet->getStyle("D3:E3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("D3:E3")->getFont()->setUnderline(true);
            
            $sheet->mergeCells("C5:D5");
            $sheet->setCellValue("C5", "TỔNG HỢP DANH SÁCH ĐỀ TÀI THUỘC LOẠI ".$type);
            $sheet->getStyle("C5:D5")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("C5:D5")->getFont()->setBold(true)->setSize(14);

            $sheet->setCellValue('A' . $rowCount, 'MÃ ĐỀ TÀI');
            $sheet->setCellValue('B' . $rowCount, 'TÊN ĐỀ TÀI');
            $sheet->setCellValue('C' . $rowCount, 'SINH VIÊN THỰC HIỆN');
            $sheet->setCellValue('D' . $rowCount, 'NGÀY GIAO');
            $sheet->setCellValue('E' . $rowCount, 'NGÀY NGHIỆM THU');
            $sheet->setCellValue('F' . $rowCount, 'XẾP LOẠI');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['hoTen']);
                $sheet->setCellValue('D' . $rowCount, $row['ngayGiao']);
                $sheet->setCellValue('E' . $rowCount, $row['ngayNghiemThu']);
                $sheet->setCellValue('F' . $rowCount, $type);
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
            $rowCount = 8;
            $spreadsheet->getDefaultStyle()->getFont()->setName("Time new Roman");
            $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
            //set width for column
            $sheet->getColumnDimension('A')->setWidth(12);
            $sheet->getColumnDimension('B')->setWidth(45);
            $sheet->getColumnDimension('C')->setWidth(37);
            $sheet->getColumnDimension('D')->setWidth(28);
            $sheet->getColumnDimension('E')->setWidth(20);
            $sheet->getColumnDimension('F')->setWidth(12);


            $sheet->setCellValue("B2", "TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VINH");
            $sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
            $sheet->mergeCells("D2:E2");
            $sheet->setCellValue("D2", "Cộng hòa xã hội chủ nghĩa Việt Nam");
            $sheet->getStyle("D2:E2")->getFont()->setBold(true);
            $sheet->getStyle("D2:E2")->getAlignment()->setHorizontal('center');
            $sheet->setCellValue("B3", "Phòng Khoa học - hợp tác Quốc Tế");
            $sheet->getStyle("B3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("B3")->getFont()->setBold(true);
    
            $sheet->mergeCells("D3:E3");
            $sheet->setCellValue("D3", "Độc lập - tự do - hạnh phúc");
            $sheet->getStyle("D3:E3")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("D3:E3")->getFont()->setUnderline(true);
            
            $sheet->mergeCells("C5:D5");
            $sheet->setCellValue("C5", "TỔNG HỢP DANH SÁCH ĐỀ TÀI THUỘC LOẠI ".$type. " NĂM ".$year);
            $sheet->getStyle("C5:D5")->getAlignment()->setHorizontal('center');
            $sheet->getStyle("C5:D5")->getFont()->setBold(true)->setSize(14);

            $sheet->setCellValue('A' . $rowCount, 'MÃ ĐỀ TÀI');
            $sheet->setCellValue('B' . $rowCount, 'TÊN ĐỀ TÀI');
            $sheet->setCellValue('C' . $rowCount, 'SINH VIÊN THỰC HIỆN');
            $sheet->setCellValue('D' . $rowCount, 'NGÀY GIAO');
            $sheet->setCellValue('E' . $rowCount, 'NGÀY NGHIỆM THU');
            $sheet->setCellValue('F' . $rowCount, 'XẾP LOẠI');
            foreach ($data as $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['maDeTai']);
                $sheet->setCellValue('B' . $rowCount, $row['tenDeTai']);
                $sheet->setCellValue('C' . $rowCount, $row['hoTen']);
                $sheet->setCellValue('D' . $rowCount, $row['ngayGiao']);
                $sheet->setCellValue('E' . $rowCount, $row['ngayNghiemThu']);
                $sheet->setCellValue('F' . $rowCount, $type);
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