<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

require_once('../../includes/db.php');
require_once('../../models/comment.php');

$db = new db();
$connect = $db->connect();
$comment = new Comment($connect);
$comment->id = isset($_GET['id']) ? $_GET['id'] : die();
$comment->readID();
$comment_item = array(
    'id' => $img_content->id,
    'id_manga' => $comment->id_manga,
    'id_user' => $comment->id_user,
    'content' => $comment->content,
    'create_at' => $comment->create_at
);
print_r(json_encode($comment_item));
