<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/user.php';
require_once '../model/cart.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$order_id = get_get('order_id');
$total = get_get('total');
$date = get_get('date');

if($user['type'] === USER_TYPE_ADMIN){
    $details = get_details($db,$order_id);
}else {
    $details = get_details($db,$order_id,$user['user_id']);
}

include_once '../view/details_view.php';