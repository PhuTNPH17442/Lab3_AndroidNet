<?php

class Img_Content
{
    private $conn;

    public $id;
    public $link_img;
    public $id_manga;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function read()
    {
        $query = "SELECT * FROM  tb_img_content ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    public function readID()
    {
        $query = "SELECT * FROM  tb_img_content WHERE id=:get_id LIMIT 1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":get_id", $this->id);

        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->link_img = $row['link_img'];
        $this->id_manga = $row['id_manga'];
    }
    public function create()
    {
        $query = "INSERT INTO tb_img_content SET link_img=:link_img , id_manga=:id_manga";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->link_img = htmlspecialchars(strip_tags($this->link_img));
        $this->id_manga = htmlspecialchars(strip_tags($this->id_manga));

        // ràng buộc dữ liệu
        $stmt->bindParam(':link_img', $this->link_img,);
        $stmt->bindParam(':id_manga', $this->id_manga);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function update()
    {
        $query = "UPDATE tb_img_content SET link_img=:link_img , id_manga=:id_manga WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // dữ liệu trống
        $this->link_img = htmlspecialchars(strip_tags($this->link_img));
        $this->id_manga = htmlspecialchars(strip_tags($this->id_manga));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // ràng buộc dữ liệu
        $stmt->bindParam(':link_img', $this->link_img,);
        $stmt->bindParam(':id_manga', $this->id_manga);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        print_r("Error %s.\n", $stmt->error);
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM tb_img_content WHERE id=:id";
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
