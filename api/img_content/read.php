<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

require_once('../../includes/db.php');
require_once('../../models/img-content.php');

$db = new db();
$connect = $db->connect();
$img_content = new Img_Content($connect);
$read = $img_content->read();

$num = $read->rowCount();
if ($num > 0) {
    $img_content_array = [];
    $img_content_array['data'] = [];
    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $img_content_item = array(
            'id' => $id,
            'link_img' => $link_img,
            'id_manga' => $id_manga
        );
        array_push($img_content_array['data'], $img_content_item);
    }
    echo json_encode($img_content_array);
}
