<?php
class Home extends controller
{
    function show()
    {
        $value = "Tran Van Nguyen";
        $this->view("trangchu", ["title" => $value]);
    }
    public  function DefaultPage()
    {
        $this->view("masterPage", [
            "header" => "users/header",
            "page" => "users/contentMain",
        ]);
    }
    public function ArticleDetail()
    {
        $this->view("masterPage", [
            "page" => "users/articleDetail",
        ]);
    }
}
