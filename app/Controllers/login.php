<?php
class login  extends controller
{
    public function DefaultPage()
    {
        $this->view("Block/users/login");
    }
    function dangNhap()
    {
        $data = $this->Model('dangNhap')->handleLogin();
        if ($data == 0) {
            header("Location:../login");
        } else {
            header("Location:../Admin");
        }
    }
}