<?php
class Tintuc extends controller
{
    public $news;
    function __construct()
    {
        $this->news = $this->Model('news');
    }
    function DefaultPage()
    {
        $data = $this->news->getList();
        $this->view("masters", [
            "page" => "admin/newsManager",
            "dataNews" => $data,
            "Action" => "5"
        ]);
    }
    function quanLyTin()
    {
        if (isset($_GET['search'])) {
            $search_content = $_GET['search'];
            $dataSearch = $this->news->getDataSearch($search_content);
            if (!empty($dataSearch)) {
                $this->view("masters", [
                    "page" => "admin/newsManager",
                    "dataNews" => $dataSearch,
                    "Action" => "5"
                ]);
            } else {
                $_SESSION['status'] = "Thông tin về bài đăng này không tìm thấy !";
                $_SESSION['status_code'] = "error";
                header("Location: ../Tintuc/quanLyTin");
            }
        } else {
            $data = $this->news->getList();
            $this->view("masters", [
                "page" => "admin/newsManager",
                "dataNews" => $data,
                "Action" => "5"
            ]);
        }
    }

    function NewsDetail($id)
    {
        $data = $this->news->getNewById($id);
        $this->view("masters", [
            "page" => "admin/showNewDetail",
            "Action" => "5",
            "dataNewById" => $data
        ]);
    }
    function updateNew()
    {
        $id = $_POST['maTinTuc'];
        $data = $this->news->updateNew();
        if ($data == 1) {
            header("location:../Tintuc/quanLyTin");
        } else {
            $this->NewsDetail($id);
        }
    }
    function DelNew()
    {
        $this->news->delNew();
    }
}