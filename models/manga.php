<?php

class Manga
{
    private $conn;

    public $id;
    public $name;
    public $author;
    public $year;
    public $avatar;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function read()
    {
        $query = "SELECT * FROM  tb_manga ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    public function readID()
    {
        $query = "SELECT * FROM  tb_manga WHERE id=:get_id LIMIT 1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":get_id", $this->id);

        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->author = $row['author'];
        $this->year = $row['year'];
        $this->avatar = $row['avatar'];
    }
    public function create()
    {
        $query = "INSERT INTO tb_manga SET name=:name , author=:author ,year=:year ,avatar=:avatar";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->year = htmlspecialchars(strip_tags($this->year));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));

        // ràng buộc dữ liệu
        $stmt->bindParam(':name', $this->name,);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':year', $this->year);
        $stmt->bindParam(':avatar', $this->avatar);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function update()
    {
        $query = "UPDATE tb_manga SET name=:name , author=:author ,year=:year ,avatar=:avatar WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->year = htmlspecialchars(strip_tags($this->year));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // ràng buộc dữ liệu
        $stmt->bindParam(':name', $this->name,);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':year', $this->year);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM tb_manga WHERE id=:id";
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
