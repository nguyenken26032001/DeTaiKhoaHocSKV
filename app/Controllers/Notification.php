<?php
class Notification extends controller
{
    public function DefaultPage()
    {
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/notificationDetail",
            "css" => "notificationDetail"
        ]);
    }
    public function Detail()
    {
        $this->view("masterPage", [
            "header" => "users/headerNoSearch",
            "page" => "users/notificationDetail",
            "css" => "notificationDetail"
        ]);
    }
}
