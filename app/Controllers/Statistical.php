<?php
class Statistical extends controller
{
    function statistical_By_Derpartment()
    {
        if (isset($_POST)) {
            $value = $_POST['value'];
            if ($value == "khoa") {
                $data = $this->Model("thongke")->statistical_By_Derpartment();
                $index = 0;
                foreach ($data as $item) {
                    echo '
                    <tr>
                    <td>' . ++$index . '</td>
                    <td>' . $item['tenkhoa'] . '</td>
                    <td>' . $item['soluong'] . '</td>
                    </tr>';
                }
            }
        }
    }
}
