<?php
class Home extends controller
{
    function showPageMaster()
    {
        $data = $this->Model("postArticle")->getListPost();
        $Carousel = $this->Model('banner')->getbanner();
        $this->view("masterPage", [
            "header" => "users/header",
            "page" => "users/contentMain",
            "Carousel" => $Carousel,
            "dataDetai" => $data,
        ]);
    }
    public  function DefaultPage()
    {
        $numberPost = $this->Model("postArticle")->getCountPost();
        $Carousel = $this->Model('banner')->getbanner();
        $limit = 1;
        $page = 1;
        $numberPost = $numberPost[0]['number'];
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if ($page < 0) {
            $page = 1;
        }
        $firstIndex = ($page - 1) * $limit;
        $data = $this->Model("postArticle")->getListPost($firstIndex, $limit);
        if (isset($_GET['search'])) {
            $search_content = $_GET['search'];
            $dataSearch = $this->Model('postArticle')->getDataSearch($search_content);
            if (!empty($dataSearch)) {
                $this->view("masterPage", [
                    "header" => "users/header",
                    "page" => "users/contentMain",
                    "Carousel" => $Carousel,
                    "dataDetai" => $dataSearch,
                    "pageIndex" => $page,
                ]);
            } else {
                $_SESSION['status'] = "Thông tin bạn muốn tìm kiếm không tồn tại !";
                $_SESSION['status_code'] = "warning";
                header("location:../Home/showPageMaster");
            }
        } else {
            $this->view("masterPage", [
                "header" => "users/header",
                "page" => "users/contentMain",
                "Carousel" => $Carousel,
                "dataDetai" => $data,
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
        ]);
    }
}
