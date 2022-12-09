<?php
include "db.php";
$query = "SELECT * FROM `tb_manga` ORDER BY id DESC";
$data = mysqli_query($conn, $query);
$result = array();
while($row = mysqli_fetch_assoc($data)){
    $result [] = ($row);

}
if(!empty($result)){
    $arr =[
        'success' => true,
        'message' => 'thanh cong',
        'result' =>$result
    ];
}else{
    $arr =[
        'success' => false,
        'message' => '0 thanh cong',
        'result' =>$result
    ];
}
print_r(json_encode($arr));