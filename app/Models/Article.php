<?php
class Article extends DB
{
    function getArticleList()
    {
        $sql = "SELECT * from detai";
        return $this->executeResult($sql);
    }
    function getArticleById($maDeTai)
    {
        $sql = "SELECT detai.maDeTai as maDeTai,tenDeTai as tenDeTai,khoaChuTri,thoiGianGiao,thoiGianNghiemThu,mucTieuNghienCuu,sanPhamNghienCuu,xepLoai,fileBaoCao,giaovienhd.hoTen as hotenGVHD,giaovienhd.khoa as khoaGVHD, sinhvien.hoTen as hotenCNDT, sinhvien.maKhoa as khoaCNDT,sinhvien.lop as lop, sinhvien.nienKhoa FROM sinhvien,detai,giaovienhd 
        WHERE detai.maDeTai=giaovienhd.maDeTai and detai.maDeTai=sinhvien.maDeTai and detai.maDeTai='$maDeTai' and sinhvien.vaiTro='Chủ nhiệm đề tài'";
        return $this->executeResult($sql);
    }
    function countMember($maDeTai)
    {
        $sql = "SELECT COUNT(id) as numberMember from sinhvien where maDeTai='$maDeTai'";
        return $this->executeResult($sql);
    }

    function addArticle()
    {
        //* chủ nhiệm đề tài : CNDT
        //*thành viên: Member: MB
        $data = 0;
        if (isset($_POST['addDeTai'])) {
            $maDeTai = $_POST['maDeTai'];
            $tenDeTai = $_POST['tenDeTai'];
            $khoaChuTri = $_POST['khoaChuTri'];
            $ngayGiao = $_POST['ngayGiao'];
            $ngayNghiemThu = $_POST['ngayNghiemThu'];
            $GVHD = $_POST['GVHD'];
            $khoaGVHD = $_POST['khoaGVHD'];
            $CNDT = $_POST['chuNhiemDeTai'];
            $khoaCNDT = $_POST['khoaChuNhiem'];
            $lopCNDT = $_POST['lopCNDT'];
            $nienKhoaCNDT = $_POST['nienKhoaCNDT'];
            $mucTieuNghienCuu = $_POST['mucTieuNghienCuu'];
            $SPNghienCuu = $_POST['SPNghienCuu'];
            $xepLoaiDT = $_POST['article_type'];
            $member = $_POST['member'];
            $file = $_FILES['fileUploads'];
            $date1 = strtotime($ngayGiao);
            $date2 = strtotime($ngayNghiemThu);
            $checkArticle = $this->checkExitsArticle($maDeTai);
            if (!empty($checkArticle) && count($checkArticle) > 0) {
                $_SESSION['status'] = "Mã đề tài đã tồn tại vui lòng kiểm tra lại !";
                $_SESSION['status_code'] = "error";
                $data = 0;
            } else {
                if ($date1 > $date2) {
                    $_SESSION['status'] = "Vui lòng nhập đúng thời gian giao và nghiệm thu đề tài.";
                    $_SESSION['status_code'] = "error";
                    $data = 0;
                } else {
                    $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
                    $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'pdf'];
                    $fileBaoCao = $this->getFileName();
                    if (in_array($extension, $allowed)) {
                        move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/FileArticle/' . $fileBaoCao);
                        $sqlAddArticle = "INSERT INTO detai (maDeTai,tenDeTai,khoaChuTri,thoiGianGiao,thoiGianNghiemThu,mucTieuNghienCuu,sanPhamNghienCuu,xepLoai,fileBaoCao) values('$maDeTai','$tenDeTai','$khoaChuTri','$ngayGiao','$ngayNghiemThu','$mucTieuNghienCuu','$SPNghienCuu','$xepLoaiDT','$fileBaoCao')";
                        $this->execute($sqlAddArticle);
                        $_SESSION['status'] = "Thêm  đề tài thành công !";
                        $_SESSION['status_code'] = "success";
                        //* insert instructors
                        $sqlInsertTeacher = "INSERT INTO giaovienhd(maDeTai,hoTen,khoa) values('$maDeTai','$GVHD','$khoaGVHD')";
                        $this->execute($sqlInsertTeacher);
                        new DB();
                        //* insert member
                        $sqlInsertHost = "INSERT INTO sinhvien(hoTen,maDeTai,maKhoa,lop,nienKhoa,vaiTro) values('$CNDT','$maDeTai','$khoaCNDT','$lopCNDT','$nienKhoaCNDT','Chủ nhiệm đề tài')";
                        $this->execute($sqlInsertHost);

                        if ($member > 0) {
                            for ($i = 1; $i <= $member; $i++) {
                                $nameMB = $_POST["name_MB" . $i];
                                $khoaMB = $_POST["khoa_MB" . $i];
                                $lopMB = $_POST["lop_MB" . $i];
                                $nienKhoaMB = $_POST["nienKhoa_MB" . $i];
                                $sqlInsertMember = "INSERT INTO sinhvien(hoTen,maDeTai,maKhoa,lop,nienKhoa,vaiTro) values('$nameMB','$maDeTai','$khoaMB','$lopMB','$nienKhoaMB','Thành Viên')";
                                $this->execute($sqlInsertMember);
                            }
                        }
                        $data = 1;
                    } else {
                        $_SESSION['status'] = "Định dạng của file báo cáo không được Uploads ";
                        $_SESSION['status_code'] = "error";
                        $data = 0;
                    }
                }
            }
        }
        return $data;
    }
    function updateArticle()
    {
        $data = 0;
        if (isset($_POST["updateDeTai"])) {
            $maDeTai = $_POST['maDeTai'];
            $tenDeTai = $_POST['tenDeTai'];
            $khoaChuTri = $_POST['khoaChuTri'];
            $ngayGiao = $_POST['ngayGiao'];
            $ngayNghiemThu = $_POST['ngayNghiemThu'];
            $GVHD = $_POST['GVHD'];
            $khoaGVHD = $_POST['khoaGVHD'];
            $CNDT = $_POST['chuNhiemDeTai'];
            $khoaCNDT = $_POST['khoaChuNhiem'];
            $lopCNDT = $_POST['lopCNDT'];
            $nienKhoaCNDT = $_POST['nienKhoaCNDT'];
            $mucTieuNghienCuu = $_POST['mucTieuNghienCuu'];
            $SPNghienCuu = $_POST['SPNghienCuu'];
            $xepLoaiDT = $_POST['article_type'];
            $member = $_POST['member'];
            $file = $_FILES['fileUploads'];
            $fileold = $_POST['file_Old'];
            //check date
            $date1 = strtotime($ngayGiao);
            $date2 = strtotime($ngayNghiemThu);
            if ($date1 > $date2) {
                $_SESSION['status'] = "Vui lòng nhập đúng thời gian giao và nghiệm thu đề tài.";
                $_SESSION['status_code'] = "error";
                $data = 0;
            } else {
                if (!empty($file['name'])) {
                    $extension = pathinfo($_FILES['fileUploads']['name'], PATHINFO_EXTENSION);
                    $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'pdf'];
                    $fileBaoCao = $this->getFileName();
                    if (in_array($extension, $allowed)) {
                        move_uploaded_file($_FILES['fileUploads']['tmp_name'], './Uploads/FileArticle/' . $fileBaoCao . '');
                        $sqlUpdateArticle = "UPDATE  detai set tenDeTai='$tenDeTai',khoaChuTri='$khoaChuTri',thoiGianGiao='$ngayGiao',thoiGianNghiemThu='$ngayNghiemThu',mucTieuNghienCuu='$mucTieuNghienCuu',sanPhamNghienCuu='$SPNghienCuu', xepLoai='$xepLoaiDT',fileBaoCao='$fileBaoCao' WHERE maDeTai='$maDeTai' ";
                        $this->execute($sqlUpdateArticle);
                        $isCheckPostDeTai = $this->getPostArticleById($maDeTai);
                        if (!empty($isCheckPostDeTai) && count($isCheckPostDeTai) > 0) {
                            $updateFile_tablePostArticle = "UPDATE postdetai SET fileBaoCao='$fileBaoCao' WHERE maDeTai='$maDeTai'";
                            $this->execute($updateFile_tablePostArticle);
                        }
                        unlink('./Uploads/FileArticle/' . $fileold . '');
                        $sqlUpdateHost = "UPDATE sinhvien SET hoTen='$CNDT',maKhoa='$khoaCNDT',lop='$lopCNDT',nienKhoa='$nienKhoaCNDT' WHERE maDeTai='$maDeTai' and vaiTro='Chủ nhiệm đề tài'";
                        $this->execute($sqlUpdateHost);
                        $sqlUpdateTeacher = "UPDATE giaovienhd SET hoTen='$GVHD',khoa='$khoaGVHD' WHERE maDeTai='$maDeTai'";
                        $this->execute($sqlUpdateTeacher);
                        //*#### update member
                        $_SESSION['status'] = "Cập nhật đề tài thành công !";
                        $_SESSION['status_code'] = "success";
                        $data = 1;
                    } else {
                        $_SESSION['status'] = "Vui lòng Upload file đúng định dạng.";
                        $_SESSION['status_code'] = "error";
                    }
                } else {
                    $sqlUpdateArticleNotFile = "UPDATE  detai set tenDeTai='$tenDeTai',khoaChuTri='$khoaChuTri',thoiGianGiao='$ngayGiao',thoiGianNghiemThu='$ngayNghiemThu',mucTieuNghienCuu='$mucTieuNghienCuu',sanPhamNghienCuu='$SPNghienCuu' WHERE maDeTai='$maDeTai' ";
                    $this->execute($sqlUpdateArticleNotFile);
                    $sqlUpdateHost = "UPDATE sinhvien SET hoTen='$CNDT',maKhoa='$khoaCNDT',lop='$lopCNDT',nienKhoa='$nienKhoaCNDT' WHERE maDeTai='$maDeTai' and vaiTro='Chủ nhiệm đề tài'";
                    $this->execute($sqlUpdateHost);
                    $sqlUpdateTeacher = "UPDATE giaovienhd SET hoTen='$GVHD',khoa='$khoaGVHD' WHERE maDeTai='$maDeTai'";
                    $this->execute($sqlUpdateTeacher);
                    $_SESSION['status'] = "Cập nhật đề tài thành công !";
                    $_SESSION['status_code'] = "success";
                    $data = 1;
                }
            }
        }
        return $data;
    }
    function getPostArticleById($maDeTai)
    {
        $sql = "SELECT maDeTai FROM postdetai WHERE maDeTai='$maDeTai'";
        return $this->executeResult($sql);
    }
    function delArticle()
    {
        if (isset($_POST)) {
            $maDeTai = $_POST['maDeTai'];
            $fileBaoCao = $this->getFileBaoCaoById($maDeTai);
            $sqlDelStudent = "DELETE FROM sinhvien WHERE maDeTai='$maDeTai'";
            $this->execute($sqlDelStudent);
            $sqlDelMentor = "DELETE FROM giaovienhd WHERE maDeTai  = '$maDeTai'";
            $this->execute($sqlDelMentor);
            $sqlDelArticle = "DELETE FROM detai WHERE maDeTai  = '$maDeTai'";
            $this->execute($sqlDelArticle);
            unlink('./Upload/FileArticle/' . $fileBaoCao);
            $isCheckPostDeTai = $this->getPostArticleById($maDeTai);
            if (!empty($isCheckPostDeTai) && count($isCheckPostDeTai) > 0) {
                $sqlPost = "DELETE FROM postdetai WHERE maDeTai = '$maDeTai'";
                $this->execute($sqlPost);
            }
            $_SESSION['status'] = 'Xóa đề tài thành công !';
            $_SESSION['status_code'] = "success";
        }
    }
    function checkExitsArticle($maDeTai)
    {
        $sql =  "SELECT maDeTai from detai where maDeTai='$maDeTai'";
        $data = $this->executeResult($sql);
        return $data;
    }
    function getListMaDeTai()
    {
        $sql = "SELECT maDeTai FROM detai ";
        return $this->executeResult($sql);
    }
    function getFileBaoCaoById($maDeTai)
    {
        $sql = "SELECT fileBaoCao FROM detai WHERE maDeTai = '$maDeTai'";
        return $this->executeResult($sql);
    }
    function getKhoaChuTri($maDeTai)
    {
        $sql = "SELECT khoaChuTri from detai where maDeTai = '$maDeTai'";
        $data = $this->executeResult($sql);
        return $data[0]['khoaChuTri'];
    }
}
