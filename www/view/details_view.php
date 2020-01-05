<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細</h1>
  <div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php print(h($order_id)); ?></td>
            <td><?php print(h($date)); ?></td>
            <td><?php print(number_format(h($total))); ?>円</td>
          </tr>
        </tbody>
    </table>

    <?php if(count($details) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>購入価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($details as $row){ ?>
          <tr>
            <td><?php print(h($row['name'])); ?></td>
            <td><?php print(number_format(h($row['price']))); ?></td>
            <td><?php print(number_format(h($row['amount']))); ?></td>
            <td><?php print(number_format(h($row['price'])*h($row['amount']))); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      
    <?php } else { ?>
      <p>購入明細はありません。</p>
    <?php } ?> 
  </div>
</body>
</html>