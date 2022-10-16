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
    function Thongketheotieuchi()
    {
        $listyear = $this->Model('thongke')->getListyear();
        $this->view("masters", [
            "page" => "admin/StatisticalDetail",
            "Action" => "6",
            "listyear" => $listyear

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
}
