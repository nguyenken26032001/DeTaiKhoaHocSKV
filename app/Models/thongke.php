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
        $sql = "SELECT maDeTai,tenDeTai,xepLoai FROM detai WHERE thoiGianNghiemThu like '" . $year . "%'";
        return $this->executeResult($sql);
    }
}
