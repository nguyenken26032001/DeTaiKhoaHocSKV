<?php
class Article extends DB
{
    function getArticleList()
    {
        $sql = "SELECT * from detai";
        return $this->executeResult($sql);
    }
    function getArticleDetailByID($maDeTai)
    {
        $sql = "SELECT * FROM detai WHERE maDeTai= '$maDeTai'";
        return $this->executeResult($sql);
    }
    function getArticleById($maDeTai)
    {
        $sql = "SELECT detai.maDeTai as maDeTai,tenDeTai as tenDeTai,khoaChuTri,thoiGianGiao,thoiGianNghiemThu,mucTieuNghienCuu,sanPhamNghienCuu,xepLoai,fileBaoCao,sinhvien.hoTen as hotenCNDT, sinhvien.maKhoa as khoaCNDT,sinhvien.lop as lop, sinhvien.nienKhoa, detai.kinhPhi as kinhPhi FROM sinhvien,detai,giaovienhd 
        WHERE detai.maDeTai='$maDeTai' and detai.maDeTai=giaovienhd.maDeTai and detai.maDeTai=sinhvien.maDeTai and sinhvien.vaiTro='Chủ nhiệm đề tài'";
        return $this->executeResult($sql);
    }
    function countMember($maDeTai)
    {
        $sql = "SELECT COUNT(id) as numberMember from sinhvien where maDeTai='$maDeTai'";
        return $this->executeResult($sql);
    }
    function countGvhd($maDeTai)
    {
        $sql = "SELECT COUNT(id) as number_gvhd from giaovienhd where maDeTai='$maDeTai'";
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
            $number_gvhd = $_POST['gvhd'];
            $CNDT = $_POST['chuNhiemDeTai'];
            $khoaCNDT = $_POST['khoaChuNhiem'];
            $lopCNDT = $_POST['lopCNDT'];
            $nienKhoaCNDT = $_POST['nienKhoaCNDT'];
            $mucTieuNghienCuu = $_POST['mucTieuNghienCuu'];
            $SPNghienCuu = $_POST['SPNghienCuu'];
            $xepLoaiDT = $_POST['article_type'];
            $kinhPhi = str_replace(',', '', $_POST['kinhPhi']);
            $member = $_POST['member'];
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
                    $fileBaoCao = "";
                    $arrFiles = [];
                    $file_temp = $_FILES['fileUploads']['tmp_name'];
                    $files = $_FILES['fileUploads']['name'];
                    $countFiles = count($_FILES['fileUploads']['name']);
                    $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'pdf'];
                    for ($i = 0; $i < $countFiles; $i++) {
                        $extension = pathinfo($_FILES['fileUploads']['name'][$i], PATHINFO_EXTENSION);
                        $newFile = $this->getFileNameMulti($i);
                        array_push($arrFiles, $newFile);
                    }
                    if (in_array($extension, $allowed)) {

                        if ($countFiles > 1) {
                            $zip = new ZipArchive();
                            $fileZipName = "bao-cao-NCKH" . uniqid() . ".zip";
                            $zip_name = "Uploads/FileArticle/" . $fileZipName;
                            $zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE);

                            for ($i = 0; $i < $countFiles; $i++) {
                                $filename = $arrFiles[$i];
                                $temp_name = $file_temp[$i];
                                $zip->addFile($temp_name, $filename);
                            }
                            $fileBaoCao = $fileZipName;
                        } else {
                            $fileBaoCao = $this->getFileNameMulti(0);
                            move_uploaded_file($_FILES['fileUploads']['tmp_name'][0], './Uploads/FileArticle/' . $fileBaoCao);
                        }
                        //insert DB
                        $sqlAddArticle = "INSERT INTO detai (maDeTai,tenDeTai,khoaChuTri,thoiGianGiao,thoiGianNghiemThu,mucTieuNghienCuu,sanPhamNghienCuu,xepLoai,fileBaoCao,kinhPhi) values('$maDeTai','$tenDeTai','$khoaChuTri','$ngayGiao','$ngayNghiemThu','$mucTieuNghienCuu','$SPNghienCuu','$xepLoaiDT','$fileBaoCao','$kinhPhi')";
                        $this->execute($sqlAddArticle);
                        $_SESSION['status'] = "Thêm  đề tài thành công !";
                        $_SESSION['status_code'] = "success";
                        //* insert instructors
                        for ($i = 1; $i <= $number_gvhd; $i++) {
                            $name_gvhd = $_POST['name_gvhd' . $i];
                            $khoa_gvhd = $_POST['khoa_gvhd' . $i];
                            $vaiTro = "gvhd" . $i;
                            $sqlInsertTeacher = "INSERT INTO giaovienhd(maDeTai,hoTen,khoa,vaiTro) values('$maDeTai','$name_gvhd','$khoa_gvhd','$vaiTro')";
                            $this->execute($sqlInsertTeacher);
                        }
                        //* insert member
                        $sqlInsertHost = "INSERT INTO sinhvien(hoTen,maDeTai,maKhoa,lop,nienKhoa,vaiTro) values('$CNDT','$maDeTai','$khoaCNDT','$lopCNDT','$nienKhoaCNDT','Chủ nhiệm đề tài')";
                        $this->execute($sqlInsertHost);

                        if ($member > 0) {
                            for ($i = 1; $i <= $member; $i++) {
                                $nameMB = $_POST["name_MB" . $i];
                                $khoaMB = $_POST["khoa_MB" . $i];
                                $lopMB = $_POST["lop_MB" . $i];
                                $vaiTro = "Thành viên" . $i;
                                $nienKhoaMB = $_POST["nienKhoa_MB" . $i];
                                $sqlInsertMember = "INSERT INTO sinhvien(hoTen,maDeTai,maKhoa,lop,nienKhoa,vaiTro) values('$nameMB','$maDeTai','$khoaMB','$lopMB','$nienKhoaMB','$vaiTro')";
                                $this->execute($sqlInsertMember);
                            }
                        }
                        $data = 1;
                    } else {
                        //not formatted
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
            $number_gvhd = $_POST['number_gvhd'];
            $CNDT = $_POST['chuNhiemDeTai'];
            $khoaCNDT = $_POST['khoaChuNhiem'];
            $lopCNDT = $_POST['lopCNDT'];
            $nienKhoaCNDT = $_POST['nienKhoaCNDT'];
            $mucTieuNghienCuu = $_POST['mucTieuNghienCuu'];
            $SPNghienCuu = $_POST['SPNghienCuu'];
            $xepLoaiDT = $_POST['article_type'];
            $kinhPhi = str_replace(',', '', $_POST['kinhPhi']);
            $member = $_POST['member'];
            $file = $_FILES['fileUploads'];
            $file_temp = $_FILES['fileUploads']['tmp_name'];
            $fileold = $_POST['file_Old'];
            $countFiles = count($_FILES['fileUploads']['name']);
            $arrFiles = [];
            for ($i = 0; $i < $countFiles; $i++) {
                $extension = pathinfo($_FILES['fileUploads']['name'][$i], PATHINFO_EXTENSION);
                $newFile = $this->getFileNameMulti($i);
                array_push($arrFiles, $newFile);
            }
            //check date
            $date1 = strtotime($ngayGiao);
            $date2 = strtotime($ngayNghiemThu);
            if ($date1 > $date2) {
                $_SESSION['status'] = "Vui lòng nhập đúng thời gian giao và nghiệm thu đề tài.";
                $_SESSION['status_code'] = "error";
                $data = 0;
            } else {
                if (!empty($file['name'])) {
                    $allowed = ['ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'pdf'];
                    $fileBaoCao = "";
                    if (in_array($extension, $allowed)) {
                        if ($countFiles > 1) {
                            $zip = new ZipArchive();
                            $fileZipName = "bao-cao-NCKH" . uniqid() . ".zip";
                            $zip_name = "Uploads/FileArticle/" . $fileZipName;
                            $zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE);

                            for ($i = 0; $i < $countFiles; $i++) {
                                $filename = $arrFiles[$i];
                                $temp_name = $file_temp[$i];
                                $zip->addFile($temp_name, $filename);
                            }
                            $fileBaoCao = $fileZipName;
                        } else {
                            $fileBaoCao = $this->getFileNameMulti(0);
                            move_uploaded_file($_FILES['fileUploads']['tmp_name'][0], './Uploads/FileArticle/' . $fileBaoCao);
                        }
                        $sqlUpdateArticle = "UPDATE  detai set tenDeTai='$tenDeTai',khoaChuTri='$khoaChuTri',thoiGianGiao='$ngayGiao',thoiGianNghiemThu='$ngayNghiemThu',mucTieuNghienCuu='$mucTieuNghienCuu',sanPhamNghienCuu='$SPNghienCuu', xepLoai='$xepLoaiDT',fileBaoCao='$fileBaoCao',kinhPhi='$kinhPhi' WHERE maDeTai='$maDeTai' ";
                        $this->execute($sqlUpdateArticle);
                        $isCheckPostDeTai = $this->getPostArticleById($maDeTai);
                        if (!empty($isCheckPostDeTai) && count($isCheckPostDeTai) > 0) {
                            $updateFile_tablePostArticle = "UPDATE postdetai SET fileBaoCao='$fileBaoCao' WHERE maDeTai='$maDeTai'";
                            $this->execute($updateFile_tablePostArticle);
                        }
                        unlink('./Uploads/FileArticle/' . $fileold . '');
                        $sqlUpdateHost = "UPDATE sinhvien SET hoTen='$CNDT',maKhoa='$khoaCNDT',lop='$lopCNDT',nienKhoa='$nienKhoaCNDT' WHERE maDeTai='$maDeTai' and vaiTro='Chủ nhiệm đề tài'";
                        $this->execute($sqlUpdateHost);
                        for ($i = 1; $i <= $number_gvhd; $i++) {
                            $name_gvhd = $_POST['name_gvhd' . $i];
                            $khoa_gvhd = $_POST['khoa_gvhd' . $i];
                            $vaitro = "gvhd" . $i;
                            $sqlUpdateTeacher = "UPDATE giaovienhd SET hoTen='$name_gvhd',khoa='$khoa_gvhd' WHERE maDeTai='$maDeTai' and vaiTro='$vaitro'";
                            $this->execute($sqlUpdateTeacher);
                        }
                        //update member
                        if ($member > 0) {
                            for ($i = 1; $i <= $member; $i++) {
                                $nameMB = $_POST["name_MB" . $i];
                                $khoaMB = $_POST["khoa_MB" . $i];
                                $lopMB = $_POST["lop_MB" . $i];
                                $nienKhoaMB = $_POST["nienKhoa_MB" . $i];
                                $vaiTro = "Thành viên" . $i;
                                $sqlUpdateMember = "UPDATE  sinhvien SET hoTen='$nameMB',maKhoa='$khoaMB',lop='$lopMB',nienKhoa='$nienKhoaMB' where maDeTai='$maDeTai' and vaiTro='$vaiTro'";
                                $this->execute($sqlUpdateMember);
                            }
                        }
                        //*#### update member
                        $_SESSION['status'] = "Cập nhật đề tài thành công !";
                        $_SESSION['status_code'] = "success";
                        $data = 1;
                    } else {
                        $_SESSION['status'] = "Vui lòng Upload file đúng định dạng.";
                        $_SESSION['status_code'] = "error";
                    }
                } else {
                    $sqlUpdateArticleNotFile = "UPDATE  detai set tenDeTai='$tenDeTai',khoaChuTri='$khoaChuTri',thoiGianGiao='$ngayGiao',thoiGianNghiemThu='$ngayNghiemThu',mucTieuNghienCuu='$mucTieuNghienCuu',sanPhamNghienCuu='$SPNghienCuu',kinhPhi='$kinhPhi' WHERE maDeTai='$maDeTai' ";
                    $this->execute($sqlUpdateArticleNotFile);
                    $sqlUpdateHost = "UPDATE sinhvien SET hoTen='$CNDT',maKhoa='$khoaCNDT',lop='$lopCNDT',nienKhoa='$nienKhoaCNDT' WHERE maDeTai='$maDeTai' and vaiTro='Chủ nhiệm đề tài'";
                    $this->execute($sqlUpdateHost);
                    for ($i = 1; $i <= $number_gvhd; $i++) {
                        $name_gvhd = $_POST['name_gvhd' . $i];
                        $khoa_gvhd = $_POST['khoa_gvhd' . $i];
                        $vaitro = "gvhd" . $i;
                        $sqlUpdateTeacher = "UPDATE giaovienhd SET hoTen='$name_gvhd',khoa='$khoa_gvhd' WHERE maDeTai='$maDeTai' and vaiTro='$vaitro'";
                        $this->execute($sqlUpdateTeacher);
                    }
                    //update member
                    if ($member > 0) {
                        for ($i = 1; $i <= $member; $i++) {
                            $nameMB = $_POST["name_MB" . $i];
                            $khoaMB = $_POST["khoa_MB" . $i];
                            $lopMB = $_POST["lop_MB" . $i];
                            $nienKhoaMB = $_POST["nienKhoa_MB" . $i];
                            $vaiTro = "Thành viên" . $i;
                            $sqlUpdateMember = "UPDATE  sinhvien SET hoTen='$nameMB',maKhoa='$khoaMB',lop='$lopMB',nienKhoa='$nienKhoaMB' where maDeTai='$maDeTai' and vaiTro='$vaiTro'";
                            $this->execute($sqlUpdateMember);
                        }
                    }
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
    //find detai by user
    function getListArticleByDerpartment($maKhoa, $firstIndex, $limit)
    {
        $sql = "SELECT tenDeTai,maDeTai FROM detai WHERE khoaChuTri = '$maKhoa' limit $firstIndex,$limit";
        $data = $this->executeResult($sql);
        if (empty($data)) {
            $_SESSION["status"] = "Khoa bạn tìm kiếm chưa có đề tài nào !";
            $_SESSION["status_code"] = "warning";
        }
        return $data;
    }
    function getListArticleByDerpartment_Search($maKhoa, $firstIndex, $limit, $search_content)
    {
        $sql = "SELECT tenDeTai,maDeTai FROM detai WHERE khoaChuTri = '$maKhoa' and tenDeTai like '%" . $search_content . "%' limit $firstIndex,$limit";
        return  $this->executeResult($sql);
    }
    function getInfoArticleByCode($id)
    {
        $sql = "SELECT detai.maDeTai as 'maDeTai',tenDeTai,sinhvien.hoTen as 'chuNhiemDeTai', mucTieuNghienCuu,fileBaoCao FROM detai,sinhvien WHERE sinhvien.maDeTai=detai.maDeTai and detai.maDeTai = '$id'";
        return $this->executeResult($sql);
    }
}
