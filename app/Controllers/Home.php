<?php
class Home extends controller
{
    function showPageMaster()
    {
        $data = $this->Model("postArticle")->getListPostForAdmin();
        $notifications = $this->Model("Notification")->getList();
        $Carousel = $this->Model('banner')->getbanner();
        $this->view("masterPage", [
            "header" => "users/header",
            "page" => "users/contentMain",
            "Carousel" => $Carousel,
            "dataDetai" => $data,
            "pageNotifi" => "notification",
            "notifications" => $notifications,
        ]);
    }

    public  function DefaultPage()
    {
        $numberPost = $this->Model("postArticle")->getCountPost();
        $Carousel = $this->Model('banner')->getbanner();
        $limit = 10;
        $page = 1;
        $numberPost = $numberPost[0]['number'];
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if ($page <= 0) {
            $page = 1;
        }
        $firstIndex = ($page - 1) * $limit;
        $notifications = $this->Model("Notification")->getList();
        $data = $this->Model("postArticle")->getListPost($firstIndex, $limit);
        if (isset($_GET['search'])) {
            $search_content = $_GET['search'];
            $dataSearch = $this->Model('postArticle')->getDataSearch($search_content);
            if (!empty($dataSearch) && count($dataSearch) > 0) {
                $this->view("masterPage", [
                    "header" => "users/header",
                    "page" => "users/contentMain",
                    "Carousel" => $Carousel,
                    "dataDetai" => $dataSearch,
                    "pageNotifi" => "notification",
                    "notifications" => $notifications,
                    "numberPost" => $numberPost,
                    "pageIndex" => $page,
                ]);
            } else {
                $_SESSION['status'] = "Thông tin bạn muốn tìm kiếm không tồn tại !";
                $_SESSION['status_code'] = "warning";
                header("location: " . _WEB_ROOT_ . "/Home");
            }
        } else {
            $this->view("masterPage", [
                "header" => "users/header",
                "page" => "users/contentMain",
                "Carousel" => $Carousel,
                "dataDetai" => $data,
                "pageNotifi" => "notification",
                "notifications" => $notifications,
                "numberPost" => $numberPost,
                "pageIndex" => $page,
            ]);
        }
    }
    public function ArticleDetail($maDeTai)
    {
        $data = $this->Model('postArticle')->getListPostById($maDeTai);
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/articleDetail",
            "ArticleDetail" => $data,
            "css" => "articleDetail",
            "download" => "has"
        ]);
    }
    function NewDetail($id)
    {
        $data = $this->Model('news')->getNewById($id);
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/articleDetail",
            "ArticleDetail" => $data,
            "css" => "articleDetail"
        ]);
    }
    public function notificationDetail($id)
    {
        $data = $this->Model('Notification')->getListByID($id);
        $notifications = $this->Model("Notification")->getList();
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/notificationDetail",
            "css"   => "notificationDetail",
            "pageNotifi" => "notification",
            "dataNotificationDetail" => $data,
            "notifications" => $notifications,

        ]);
    }
    function backNCKH($makhoa)
    {
        $numberPost = $this->Model("postArticle")->getNumberPostByDerpartment($makhoa);
        $numberPost = $numberPost[0]['number'];
        $limit = 10;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if ($page < 0) {
            $page = 1;
        }
        $firstIndex = ($page - 1) * $limit;
        $data = $this->Model("Article")->getListArticleByDerpartment($makhoa, $firstIndex, $limit);
        if (!empty($data) && count($data) > 0) {
            $this->view("masterPage", [
                "header" => "users/headerNoSearch",
                "page" => "users/articleFindByLink",
                "dataDeTaiByLink" => $data,
                "pageIndex" => $page,
                "numberPost" => $numberPost,
            ]);
        }
    }
    function NCKH($makhoa)
    {
        $limit = 10;
        $page = 1;
        $numberPost = $this->Model("postArticle")->getNumberPostByDerpartment($makhoa);
        $numberPost = $numberPost[0]['number'];
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if ($page < 0) {
            $page = 1;
        }
        if (isset($_GET['search'])) {
            $search_content = $_GET['search'];
            $firstIndex = ($page - 1) * $limit;
            $data_search = $this->Model("Article")->getListArticleByDerpartment_Search($makhoa, $firstIndex, $limit, $search_content);
            if (!empty($data_search) && count($data_search) > 0) {
                $this->view("masterPage", [
                    "header" => "users/headerNoSearch",
                    "page" => "users/articleFindByLink",
                    "dataDeTaiByLink" => $data_search,
                    "numberPost" => $numberPost,
                    "pageIndex" => $page,
                ]);
            } else {
                $_SESSION['status'] = "Đề tài này chưa có trên hệ thống !";
                $_SESSION['status_code'] = "warning";
                $this->backNCKH($makhoa);
            }
        } else {
            $firstIndex = ($page - 1) * $limit;
            $data = $this->Model("Article")->getListArticleByDerpartment($makhoa, $firstIndex, $limit);
            if (!empty($data) && count($data) > 0) {
                $this->view("masterPage", [
                    "header" => "users/headerNoSearch",
                    "page" => "users/articleFindByLink",
                    "dataDeTaiByLink" => $data,
                    "numberPost" => $numberPost,
                    "pageIndex" => $page,
                ]);
            } else {
                $this->view("masterPage", [
                    "header" => "users/headerNoSearch",
                    "page" => "users/page404",
                    "css" => "page404"
                ]);
            }
        }
    }
    function document()
    {
        $data = $this->Model("taiLieu")->getListDocuments();
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/document",
            "dataDocuments" => $data
        ]);
    }
    function Tintuckhac()
    {
        $Carousel = $this->Model('banner')->getbanner();
        $notifications = $this->Model("Notification")->getList();
        $limit = 10;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if ($page <= 0) {
            $page = 1;
        }
        $firstIndex = ($page - 1) * $limit;
        if (isset($_GET['search'])) {
            $search_content = $_GET['search'];
            $data_search = $this->Model("news")->getDataSearch($search_content);
            if (!empty($data_search)) {
                $this->view("masterPage", [
                    "header" => "users/header",
                    "page" => "users/contentMainNews",
                    "Carousel" => $Carousel,
                    "pageNotifi" => "notification",
                    "notifications" => $notifications,
                    "dataNews" => $data_search,
                    "numberPost" => 10,
                    "pageIndex" => $page,
                ]);
            } else {
                $_SESSION['status'] = "Tin tức bạn muốn tìm chưa có trên hệ thống";
                $_SESSION['status_code'] = "warning";
                header("location:../Home/Tintuckhac");
            }
        } else {
            $data = $this->Model("news")->getNewsLimit($firstIndex, $limit);
            $numberNews = $this->Model("news")->getNumberPost();
            $numberNews = $numberNews[0]['numberNews'];
            $this->view("masterPage", [
                "header" => "users/header",
                "page" => "users/contentMainNews",
                "Carousel" => $Carousel,
                "pageNotifi" => "notification",
                "notifications" => $notifications,
                "dataNews" => $data,
                "numberPost" => $numberNews,
                "pageIndex" => $page,
            ]);
        }
    }
    function ThongTinChiTietDeTai($id)
    {
        $data = $this->Model('Article')->getInfoArticleByCode($id);
        if (!empty($data)) {
            $this->view("masterPage", [
                "header" => "users/headerNoSearch",
                "page" => "users/infoArticle",
                "ArticleDetail" => $data,
                "css" => "articleDetail"
            ]);
        }
    }
}