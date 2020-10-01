<?php
require_once MODEL_PATH . 'db.php';

//detailsテーブルにinsert
function insert_detail($db, $order_id, $price, $item_id, $amount){
  $sql = "
    INSERT INTO
      details(
        order_id,
        price,
        item_id,
        amount
      )
    VALUES(?, ?, ?, ?);
  ";

  return execute_query($db, $sql,array($order_id,$price,$item_id,$amount));
}