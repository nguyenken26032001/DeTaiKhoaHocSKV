<?php
class mentor extends DB
{
    function getlistGVHD($maDeTai)
    {
        $sql = "SELECT hoTen,khoa,vaiTro from giaovienhd where maDeTai='$maDeTai'";
        return $this->executeResult($sql);
    }
}