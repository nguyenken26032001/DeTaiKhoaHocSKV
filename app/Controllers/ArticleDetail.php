<?php
class ArticleDetail extends controller
{
    public function DefaultPage()
    {
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/articleDetail",
        ]);
    }
    public function Detail($id)
    {
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/articleDetail",
        ]);
    }
}
