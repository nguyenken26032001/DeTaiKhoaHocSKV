<?php
class Ajax extends controller
{
    protected $model;
    function __construct()
    {
        $this->model = $this->model("DepartmentModel");
    }
    function getClass()
    {
        $khoa = $_POST['maKhoa'];
        $data = $this->model->getClassByDepartment($khoa);
        foreach ($data as $item) {
            echo '<option value="' . $item['maLop'] . '">' . $item['maLop'] . '</option>';
        }
    }
    function getClassDetail()
    {
        $khoa = $_POST['khoa'];
        $heDaoTao = $_POST['heDaoTao'];
        $data = $this->model->getClassDetails($khoa, $heDaoTao);
        foreach ($data as $item) {
            echo '<option value="' . $item['maLop'] . '">' . $item['maLop'] . '</option>';
        }
    }
    function getClassTable()
    {
        $khoa = $_POST['maKhoa'];
        $data = $this->model->getClassByDepartment($khoa);
        $index = 0;
        foreach ($data as $item) {
            echo
            ' <tr  id=' . $item['maLop'] . '>
            <td>' . (++$index) . '</td>
            <td>' . $item['maLop'] . '</td>
            <td> <button class="btn btn-danger" onclick="deleteClass(\'' . $item['maLop'] . '\',\'' . $khoa . '\')"> Delete</button></td>
         </tr>';
        }
    }
    function getClassTableDetails()
    {
        $khoa = $_POST['khoa'];
        $heDaoTao = $_POST['heDaoTao'];
        $data = $this->model->getClassDetails($khoa, $heDaoTao);
        $index = 0;
        foreach ($data as $item) {
            echo
            ' <tr id=' . $item['maLop'] . ' >
            <td>' . (++$index) . '</td>
            <td>' . $item['maLop'] . '</td>
            <td> <button class="btn btn-danger"  onclick="deleteClass(\'' . $item['maLop'] . '\',\'' . $khoa . '\')">Delete</button></td>
         </tr>';
        }
    }

    function getDepartment()
    {
        if (isset($_POST)) {
            $maDeTai = $_POST["maDeTai"];
            echo  $this->Model("Article")->getKhoaChuTri($maDeTai);
        }
    }
}