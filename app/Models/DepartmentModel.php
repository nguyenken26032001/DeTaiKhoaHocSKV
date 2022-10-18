<?php
class DepartmentModel extends DB
{
    function getList()
    {
        $sql = "SELECT * FROM khoa";
        return  $this->executeResult($sql);
    }

    function getClassByDepartment($value)
    {
        $sql = "SELECT maLop from dslop where maKhoa='$value'";
        return  $this->executeResult($sql);
    }
    function getClassDetails($khoa, $heDaoTao)
    {
        $sql = "SELECT maLop from dslop,khoa where khoa.maKhoa=dslop.maKhoa and khoa.maKhoa='$khoa' and dslop.thuocLoai='$heDaoTao'";
        return  $this->executeResult($sql);
    }
}