<?php 
require_once MODEL_PATH . 'db.php';

//historiesテーブルにinsert
function insert_history($db, $user_id){
  $sql = "
    INSERT INTO
      histories(
        user_id
      )
    VALUES(?);
  ";

  return execute_query($db, $sql,array($user_id));
}

function get_user_histories($db, $user_id){
  $sql = "
    SELECT
      histories.order_id,
      histories.created,
      SUM(details.price * details.amount) AS total
    FROM
      histories
    JOIN
      details
    ON
      histories.order_id = details.order_id
    WHERE
      histories.user_id = ?
    GROUP BY
      histories.order_id
    ORDER BY
      histories.created desc
  ";
  return fetch_all_query($db, $sql, array($user_id));
}

function get_all_histories($db){
  $sql = "
    SELECT
      histories.order_id,
      histories.created,
      SUM(details.price * details.amount) AS total
    FROM
      histories
    JOIN
      details
    ON
      histories.order_id = details.order_id
    GROUP BY
      histories.order_id
    ORDER BY
      histories.created desc
  ";
  return fetch_all_query($db, $sql);
}