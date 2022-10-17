<?php
class Lop extends DB
{
    function listAll()
    {
        $sql = "SELECT maLop FROM dslop";
        return $this->executeResult($sql);
    }
    function listClassByHost($makhoa)
    {
        $sql = "SELECT maLop FROM dslop WHERE maKhoa='$makhoa'";
        return $this->executeResult($sql);
    }
    function getDepartmentAllMembers($maDeTai)
    {
        $sql = "SELECT maKhoa FROM dslop WHERE maDeTai='$maDeTai'";
        return $this->executeResult($sql);
    }
    function getListClassByMember($maKhoa, $maDeTai)
    {
        $sql = "SELECT maLop FROM dslop,sinhvien WHERE dslop.maKhoa=sinhvien.maKhoa and sinhien.maDeTai='$maDeTai'";
    }
    function addClass()
    {
        $data = 0;
        if (isset($_POST['addClass'])) {
            $maLop = $_POST['maLop'];
            $maKhoa = $_POST['maKhoa'];
            $heDaoTao = $_POST['heDaoTao'];
            $nienKhoa = $_POST['nienKhoa'];
            $data = $this->checkExistLop($maLop, $maKhoa);
            if (!empty($data) && count($data) > 0) {
                $_SESSION['status'] = "Lớp này đã tồn tại vui lòng kiểm tra lại!";
                $_SESSION['status_code'] = "error";
                $data = 0;
            } else {
                $sql = "INSERT INTO dslop (maLop,maKhoa,thuocLoai,nienKhoa) VALUES ('$maLop', '$maKhoa','$heDaoTao', '$nienKhoa')";
                $this->execute($sql);
                $_SESSION['status'] = "Thêm lớp thành công !";
                $_SESSION['status_code'] = "success";
                $data = $maKhoa;
            }
        }
        return $data;
    }
    function checkExistLop($malop, $makhoa)
    {
        $sql = "SELECT maLop FROM dslop WHERE maLop = '$malop' AND makhoa='$makhoa'";
        return $this->executeResult($sql);
    }
    function DelClass()
    {
        $malop = $_POST['maLop'];
        $maKhoa = $_POST['maKhoa'];
        $sql = "DELETE from dslop where maLop='$malop' and maKhoa='$maKhoa'";
        $this->execute($sql);
        $_SESSION['status'] = "Xóa lớp thành công !";
        $_SESSION['status_code'] = "success";
        return $maKhoa;
    }
}