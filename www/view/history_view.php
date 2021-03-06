<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>

  <div class="container">
    <h1>購入履歴</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>明細表示</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($histories as $history){ ?>
          <tr>
            <td><?php print h($history['order_id']); ?></td>
            <td><?php print h($history['created']); ?></td>
            <td><?php print(number_format($history['total'])); ?>円</td>
            <td>
            <form method="post" action="detail.php">
              <input type="submit" value="購入明細表示"> 
              <input type="hidden" name="order_id" value="<?php print h($history['order_id']); ?>">
              <input type="hidden" name="token" value="<?php print $token ?>">
            </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table> 
  </div>
</body>
</html>