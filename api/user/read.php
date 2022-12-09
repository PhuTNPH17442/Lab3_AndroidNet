<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

require_once('../../includes/db.php');
require_once('../../models/user.php');

$db = new db();
$connect = $db->connect();
$user = new User($connect);
$read = $user->read();

$num = $read->rowCount();
if ($num > 0) {
    $user_array = [];
    $user_array['data'] = [];
    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'fullname' => $fullname
        );
        array_push($user_array['data'], $user_item);
    }
    echo json_encode($user_array);
}
