<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>
  <div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($history) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>該当の注文の合計金額</th>
            <th>購入明細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($history as $row){ ?>
          <tr>
            <td><?php print(h($row['order_id'])); ?></td>
            <td><?php print(h($row['createdate'])); ?></td>
            <td><?php print(number_format(h($row['total']))); ?>円</td>
            <td><a href="<?php print(DETAIL_URL."?order_id={$row['order_id']}&total={$row['total']}&date={$row['createdate']}"); ?> ">明細確認</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      
    <?php } else { ?>
      <p>購入履歴はありません。</p>
    <?php } ?> 
  </div>
</body>
</html>