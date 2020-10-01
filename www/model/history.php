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