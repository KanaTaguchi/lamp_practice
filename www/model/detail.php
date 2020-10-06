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

function get_details($db, $order_id){
  $sql = "
    SELECT
      details.order_id,
      details.created,
      details.price,
      details.amount,
      details.price * details.amount AS sub,
      items.name
    FROM
      details
    JOIN
      items
    ON
      details.item_id = items.item_id
    WHERE
      details.order_id = ?
  ";
  return fetch_all_query($db, $sql,array($order_id));
}

function sum_sub($details){
  $total = 0;
  foreach($details as $detail){
    $total += $detail['sub'];
  }
  return $total;
}