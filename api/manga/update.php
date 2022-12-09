<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,
    X-Requested-With');

    require_once('../../includes/db.php');
    require_once('../../models/manga.php');

    $db = new db();
    $connect = $db->connect();

    $manga = new Manga($connect);

    $data = json_decode(file_get_contents('php://input'));

    $manga->id = $data->id;
    $manga->name = $data->name;
    $manga->author = $data->author;
    $manga->year = $data->year;
    $manga->avatar = $data->avatar;

    if($manga->update()){
        echo json_encode(array('message', 'Update Manga Successfully'));
    } else {
        echo json_encode(array('message', 'Update Manga failed'));
    }
