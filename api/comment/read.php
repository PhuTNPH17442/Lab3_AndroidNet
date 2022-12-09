<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

require_once('../../includes/db.php');
require_once('../../models/comment.php');

$db = new db();
$connect = $db->connect();
$comment = new Comment($connect);
$read = $comment->read();

$num = $read->rowCount();
if ($num > 0) {
    $comment_array = [];
    $comment_array['data'] = [];
    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $comment_item = array(
            'id' => $id,
            'id_manga' => $id_manga,
            'id_user' => $id_user,
            'content' => $content,
            'create_at' => $create_at
        );
        array_push($comment_array['data'], $comment_item);
    }
    echo json_encode($comment_array);
}
