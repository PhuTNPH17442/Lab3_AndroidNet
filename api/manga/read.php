<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    require_once('../../includes/db.php');
    require_once('../../models/manga.php');

    $db = new db();
    $connect = $db->connect();
    $manga = new Manga($connect);
    $read = $manga->read();

    $num = $read->rowCount();
    if ($num > 0) {
        $manga_array = [];
        $manga_array['data'] = [];
        while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $manga_item = array(
                'id' => $id,
                'name' => $name,
                'author' => $author,
                'year' => $year,
                'avatar' => $avatar
            );
            array_push($manga_array['data'], $manga_item);
        }
        echo json_encode($manga_array);
    }
