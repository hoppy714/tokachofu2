<?php

class Database
{
    private $dsn = 'mysql:dbname=sysdev5;host=database-1.cd5yzxtstf4q.us-east-1.rds.amazonaws.com';
    private $username = 'root';
    private $password = 'tokachofu';
    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            var_dump($e);
            exit();
        }
    }
}
