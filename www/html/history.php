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
if($user['type'] === USER_TYPE_ADMIN){
    $history = get_history($db);
}else {
    $history = get_history($db, $user['user_id']);
}

include_once '../view/history_view.php';