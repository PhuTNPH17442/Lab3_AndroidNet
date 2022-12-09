<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,
    X-Requested-With');

    require_once('../../includes/db.php');
    require_once('../../models/user.php');

    $db = new db();
    $connect = $db->connect();

    $user = new User($connect);

    $data = json_decode(file_get_contents('php://input'));

    $user->id = $data->id;


    if ($user->delete()) {
        echo json_encode(array('message', 'Delete User Successfully'));
    } else {
        echo json_encode(array('message', 'Delete User failed'));
    }
