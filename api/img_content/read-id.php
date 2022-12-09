<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

require_once('../../includes/db.php');
require_once('../../models/img-content.php');

$db = new db();
$connect = $db->connect();
$img_content = new Img_Content($connect);
$img_content->id = isset($_GET['id']) ? $_GET['id'] : die();
$img_content->readID();
$img_content_item = array(
    'id' => $img_content->id,
    'link_img' => $img_content->link_img,
    'id_manga' => $img_content->id_manga
);
print_r(json_encode($img_content_item));
