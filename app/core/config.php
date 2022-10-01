<?php
class config
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
}
