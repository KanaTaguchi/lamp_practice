<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'history.php';

session_start();

$token = get_csrf_token();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

if(is_admin($user) === true){
    $histories = get_all_histories($db);
}else{
    $histories = get_user_histories($db, $user['user_id']);
}

include_once '../view/history_view.php';