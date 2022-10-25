<?php
class dangNhap extends DB
{
    function handleLogin()
    {
        $value = 0;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $passWord = $_POST['passWord'];
            $isCheck = $this->isExistAcc($email, $passWord);
            $isCheck = $isCheck[0]['id'];
            if ($isCheck == 1) {
                $value = 1;
                $infor_Account = [
                    "Email" => $email,
                    "Password" => $passWord
                ];
                $_SESSION['account'] = $infor_Account;
            } else {
                $value = 0;
                $_SESSION['status'] = "Thông tin về email hoặc mật khẩu không đúng. ";
                $_SESSION['status_code'] = "error";
            }
        }
        return $value;
    }
    function isExistAcc($email, $passWord)
    {
        $sql = "SELECT COUNT(id) as 'id' FROM admin where email = '$email' and password = '$passWord'";
        return $this->executeResult($sql);
    }
}