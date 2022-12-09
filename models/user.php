<?php

class User
{
    private $conn;

    public $id;
    public $username;
    public $password;
    public $email;
    public $fullname;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function read()
    {
        $query = "SELECT * FROM  tb_user ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    public function readID()
    {
        $query = "SELECT * FROM  tb_user WHERE id=:get_id LIMIT 1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":get_id", $this->id);

        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->username = $row['username'];
        $this->password = $row['password'];
        $this->email = $row['email'];
        $this->fullname = $row['fullname'];
    }
    public function create()
    {
        $query = "INSERT INTO tb_user SET username=:username , password=:password ,email=:email ,fullname=:fullname";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));

        // ràng buộc dữ liệu
        $stmt->bindParam(':username', $this->username,);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':fullname', $this->fullname);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function update()
    {
        $query = "UPDATE tb_user SET username=:username , password=:password ,email=:email ,fullname=:fullname WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // ràng buộc dữ liệu
        $stmt->bindParam(':username', $this->username,);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM tb_user WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->id = htmlspecialchars(strip_tags($this->id));
        // ràng buộc dữ liệu
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
}
