<?php
class thongke extends DB
{
    function statistical_By_Derpartment()
    {
        $sql = "SELECT khoa.tenKhoa as 'tenkhoa', COUNT(detai.maDeTai) as 'soluong' FROM khoa,detai
        WHERE khoa.maKhoa=detai.khoaChuTri GROUP BY detai.khoaChuTri";
        return $this->executeResult($sql);
    }
    function statistical_By_Type()
    {
        $sql = "SELECT xepLoai, COUNT(xepLoai) as 'soluong' FROM detai  GROUP BY xepLoai";
        return $this->executeResult($sql);
    }
}
