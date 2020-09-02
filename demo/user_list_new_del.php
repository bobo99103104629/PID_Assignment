<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name = '刪除用戶' ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('style.php') ?>
  <title><?php echo  $page_name. ' - ' .title_name ?></title>
  <meta http-equiv="refresh" content="<?php echo auto_jump_time ?>;URL=user_list.php">
  <?php require_once ('js.php') ?>
</head>
<body>
  <?php include('nav.php'); ?>

  <div class="container my-3">

    <div class="row">
      <div class="col-12 text-center">
        <?php
        $sql = "DELETE FROM MEMBER WHERE ID='" . $_GET['ID']."'";
        $result = $conn->query($sql);
        echo '<div class="alert alert-success">';
        echo '<i class="material-icons">check</i> 刪除用戶成功';
        echo '</div>';
        $conn->close();
        ?>
      </div>
    </div>
  </div>
  <?php include('footer.php') ?>
</body>

</html>
