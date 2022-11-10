<?php
class thongke extends DB
{
    function statistical_By_Derpartment()
    {
        $sql = "SELECT khoa.tenKhoa as 'tenkhoa', COUNT(detai.maDeTai) as 'soluong' FROM khoa LEFT JOIN detai
        on khoa.maKhoa=detai.khoaChuTri GROUP BY khoa.maKhoa order By  COUNT(detai.maDeTai)";
        return $this->executeResult($sql);
    }
    function statistical_By_Type()
    {
        $sql = "SELECT xepLoai, COUNT(xepLoai) as 'soluong' FROM detai  GROUP BY xepLoai";
        return $this->executeResult($sql);
    }
    function totalStudent()
    {
        $sql = "SELECT count(id) as 'number'FROM  sinhvien";
        return $this->executeResult($sql);
    }
    function totalArticle()
    {
        $sql = "SELECT count(maDeTai)as 'numberArticle' FROM detai ";
        return $this->executeResult($sql);
    }
    function totalArticleXLKha()
    {
        $sql = "SELECT count(xepLoai)as 'numberArticle' FROM detai where xepLoai like '%khá%'";
        return $this->executeResult($sql);
    }
    function getListyear()
    {
        $sql = "SELECT thoiGianNghiemThu from detai";
        $data = $this->executeResult($sql);
        $array_tmp = [];
        foreach ($data as $item) {
            $array_tmp[] = date('Y', strtotime($item['thoiGianNghiemThu']));
        }
        $year = array_unique($array_tmp);
        return $year;
    }
    function getArticleByYear($year)
    {
        $sql = "SELECT detai.maDeTai as 'maDeTai',tenDeTai,detai.thoiGianGiao as 'ngayGiao', detai.thoiGianNghiemThu as 'ngayNghiemThu',xepLoai,hoTen FROM detai,sinhvien WHERE detai.maDeTai=sinhvien.maDeTai and detai.thoiGianNghiemThu like '" . $year . "%' ";
        return $this->executeResult($sql);
    }
    function getArticleByType($type)
    {
        $sql = "SELECT detai.maDeTai as 'maDeTai',detai.tenDeTai as 'tenDeTai',detai.thoiGianGiao as 'ngayGiao', detai.thoiGianNghiemThu as 'ngayNghiemThu',hoTen FROM detai,sinhvien  WHERE detai.maDeTai=sinhvien.maDeTai and   xepLoai = '" . $type . "'";
        return $this->executeResult($sql);
    }
    function getArticleByTypeYear($type, $year)
    {
        $sql = "SELECT detai.maDeTai as 'maDeTai',detai.tenDeTai as 'tenDeTai', detai.thoiGianGiao as 'ngayGiao', detai.thoiGianNghiemThu as 'ngayNghiemThu',hoTen FROM detai,sinhvien WHERE detai.maDeTai=sinhvien.maDeTai and  detai.xepLoai ='$type' AND detai.thoiGianNghiemThu like '" . $year . "%'";
        return $this->executeResult($sql);
    }
    function getArticleByDepartmentDetail($department)
    {
        $sql = "SELECT detai.maDeTai as 'maDeTai', tenDeTai , thoiGianGiao,thoiGianNghiemThu,xepLoai,hoTen FROM detai,sinhvien WHERE detai.maDeTai=sinhvien.maDeTai AND khoaChuTri='$department'";
        return $this->executeResult($sql);
    }
}