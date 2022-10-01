<?php
class student extends DB
{
    function getMembersByCode($maDeTai)
    {
        $sql = "SELECT hoTen,maKhoa,lop,nienKhoa FROM sinhvien WHERE maDeTai = '$maDeTai' and vaiTro='Thành viên'";
        return $this->executeResult($sql);
    }
}
