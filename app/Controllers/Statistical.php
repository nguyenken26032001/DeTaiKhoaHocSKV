<?php
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
                echo "</table";
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
                    echo "<th>Mã đề tài</th>";
                    echo "<th>Tên đề tài</th>";
                    echo "<th>Giáo viên hướng dẫn</th>";
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
                    echo "</table";
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
                echo "<th>Mã đề tài</th>";
                echo "<th>Tên đề tài</th>";
                echo "<th>Xếp loại</th>";
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
                    <td>' . $item['xepLoai'] . '</td>
                    </tr>';
                }
                echo "</tbody>";
                echo "</table";
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
                    echo "<th>Mã đề tài</th>";
                    echo "<th>Tên đề tài</th>";
                    echo "<th>Giáo viên hướng dẫn</th>";
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
                    echo "</table";
                }
            }
        }
    }
}