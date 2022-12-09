<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,
    X-Requested-With');

require_once('../../includes/db.php');
require_once('../../models/user.php');

$db = new db();
$connect = $db->connect();

$user = new User($connect);

$data = json_decode(file_get_contents('php://input'));

$user->id = $data->id;
$user->username = $data->username;
$user->password = $data->password;
$user->email = $data->email;
$user->fullname = $data->fullname;

if ($user->update()) {
    echo json_encode(array('message', 'Update User Successfully'));
} else {
    echo json_encode(array('message', 'Update User failed'));
}
