<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,
    X-Requested-With');

require_once('../../includes/db.php');
require_once('../../models/manga.php');

$db = new db();
$connect = $db->connect();

$manga = new Manga($connect);

$data = json_decode(file_get_contents('php://input'));

$manga->id = $data->id;


if ($manga->delete()) {
    echo json_encode(array('message', 'Delete Manga Successfully'));
} else {
    echo json_encode(array('message', 'Delete Manga failed'));
}
