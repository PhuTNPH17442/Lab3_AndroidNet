<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,
    X-Requested-With');

require_once('../../includes/db.php');
require_once('../../models/img-content.php');

$db = new db();
$connect = $db->connect();

$img_content = new Img_Content($connect);

$data = json_decode(file_get_contents('php://input'));

$img_content->link_img = $data->link_img;
$img_content->id_manga = $data->id_manga;


if ($img_content->create()) {
    echo json_encode(array('message', 'Create img_content Successfully'));
} else {
    echo json_encode(array('message', 'Create img_content failed'));
}
