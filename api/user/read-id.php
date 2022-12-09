<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

require_once('../../includes/db.php');
require_once('../../models/user.php');

$db = new db();
$connect = $db->connect();
$user = new User($connect);
$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->readID();
$user_item = array(
    'id' => $user->id,
    'username' => $user->username,
    'password' => $user->password,
    'email' => $user->email,
    'fullname' => $user->fullname
);
print_r(json_encode($user_item));
