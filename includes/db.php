<?php
class db
{
    // kết nối cơ sở dữ liệu
    private $host = 'localhost:3306';
    private $db_user = 'root';
    private $db_password = '';
    private $db_name = 'manga';
    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . "", $this->db_user, $this->db_password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
        return $this->conn;
    }
}
