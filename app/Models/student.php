<?php
class student extends DB
{
    function getMembersByCode($maDeTai)
    {
        $vaitro = "Thành viên";
        $sql = "SELECT hoTen,maKhoa,lop,nienKhoa FROM sinhvien WHERE maDeTai = '$maDeTai' and vaiTro like '" . $vaitro . "%'";
        return $this->executeResult($sql);
    }
}
