<?php
class DB
{
    public $conn;
    private $SERVER_NAME =   "localhost";
    private $USER_NAME   =   "root";
    private $PASSWORD    =   "";
    private $DATABASE    =   "quanlydetaikhoahoc";
    function __construct()
    {
        $this->conn = mysqli_connect($this->SERVER_NAME, $this->USER_NAME, $this->PASSWORD, $this->DATABASE);
        mysqli_set_charset($this->conn, 'utf8');
        if ($this->conn->connect_error) {
            var_dump($this->conn->error);
            die();
        }
    }
    function stripUnicode($str)
    {
        if (!$str) return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str;
    }

    function changeTitle($str)
    {
        $str = trim($str);
        if ($str == "") return "";
        $str = str_replace('"', '', $str);
        $str = str_replace("'", '', $str);
        $str = $this->stripUnicode($str);
        $str = mb_convert_case($str, MB_CASE_TITLE, 'utf-8');

        // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
        $str = str_replace(' ', '-', $str);
        return $str;
    }
    public function execute($sql)
    {
        $this->conn =  new mysqli($this->SERVER_NAME, $this->USER_NAME, $this->PASSWORD, $this->DATABASE);
        mysqli_set_charset($this->conn, 'utf8');
        // mysqli_set_charset($this->conn, 'utf8');
        mysqli_query($this->conn, $sql);
        mysqli_close($this->conn);
    }
    public function executeResult($sql)
    {
        $this->conn =  new mysqli($this->SERVER_NAME, $this->USER_NAME, $this->PASSWORD, $this->DATABASE);
        $result = mysqli_query($this->conn, $sql);
        $data = [];
        if ($result != null) {
            while ($row = mysqli_fetch_array($result, 1)) {
                $data[] = $row;
            }
            mysqli_close($this->conn);
            return $data;
        }
    }
}
