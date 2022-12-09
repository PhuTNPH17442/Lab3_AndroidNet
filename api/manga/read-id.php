<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

require_once('../../includes/db.php');
require_once('../../models/manga.php');

$db = new db();
$connect = $db->connect();
$manga = new Manga($connect);
$manga->id = isset($_GET['id']) ? $_GET['id'] : die();
$manga->readID();
$manga_item = array(
    'id' => $manga->id,
    'name' => $manga->name,
    'author' => $manga->author,
    'year' => $manga->year,
    'avatar' => $manga->avatar
);
print_r(json_encode($manga_item));
