<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'detail.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
$token = get_post('token');

$result_token = is_valid_csrf_token($token);
if( $result_token === false){
  set_error('不正なページ遷移です。');
  redirect_to(HISTORY_URL);
}
$db = get_db_connect();
$user = get_login_user($db);

$order_id = get_post('order_id');
$details = get_details($db, $order_id);

$total = sum_sub($details);

include_once '../view/detail_view.php';