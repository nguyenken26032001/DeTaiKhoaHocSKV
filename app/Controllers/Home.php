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
        if ($page < 0) {
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
        $firstIndex = ($page - 1) * $limit;
        $data = $this->Model("postArticle")->getListPostByDerpartment($makhoa, $firstIndex, $limit);
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
