<?php
require_once "config.php";

class DataBase
{
    private $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function getRows($query)
    {
        $res = false;
        if($this->connect) {
            $sql = mysqli_query($this->connect, $query);
            if($sql) {
                $res = [];
                while ($item = mysqli_fetch_array($sql)) {
                    array_push($res, $item);
                }
            }
        }
        return $res;
    }

    public function query($query) {
        $res = false;
        if($this->connect) {
            $res = $this->connect->query($query);
        }
        return $res;
    }

    function __destruct()
    {
       if($this->connect) {
           mysqli_close($this->connect);
       }
    }
}