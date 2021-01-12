<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "testing";

    private $con;

    public function getConnection()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name) or die('Database Connection Failed.');
        return $this->con;
    }
}