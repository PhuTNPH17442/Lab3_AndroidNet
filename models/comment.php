<?php

class Comment
{
    private $conn;

    public $id;
    public $id_manga;
    public $id_user;
    public $content;
    public $create_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function read()
    {
        $query = "SELECT * FROM  tb_comment ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    public function readID()
    {
        $query = "SELECT * FROM  tb_comment WHERE id=:get_id LIMIT 1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":get_id", $this->id);

        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_manga = $row['id_manga'];
        $this->id_user = $row['id_user'];
        $this->content = $row['content'];
        $this->create_at = $row['create_at'];
    }
    public function create()
    {
        $query = "INSERT INTO tb_comment SET id_manga=:id_manga , id_user=:id_user ,content=:content ,create_at=:create_at";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->id_manga = htmlspecialchars(strip_tags($this->id_manga));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->create_at = htmlspecialchars(strip_tags($this->create_at));

        // ràng buộc dữ liệu
        $stmt->bindParam(':id_manga', $this->id_manga,);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':create_at', $this->create_at);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function update()
    {
        $query = "UPDATE tb_comment SET id_manga=:id_manga , id_user=:id_user ,content=:content ,create_at=:create_at WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->id_manga = htmlspecialchars(strip_tags($this->id_manga));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->create_at = htmlspecialchars(strip_tags($this->create_at));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // ràng buộc dữ liệu
        $stmt->bindParam(':id_manga', $this->id_manga,);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':create_at', $this->create_at);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM tb_comment WHERE id=:id";
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
