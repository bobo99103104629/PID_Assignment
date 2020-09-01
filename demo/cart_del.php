<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name="商品移除"?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('style.php') ?>
  <title><?php echo  $page_name. ' - ' .title_name ?></title>
  <meta http-equiv="refresh" content="<?php echo 0 ?>;URL=cart.php">
  <?php require_once ('js.php') ?>
</head>

<body>
  <?php include('nav.php'); ?>
  <div class="container my-3">
    <div class="row" >
      <div class="col-12 text-center ">
        <?php
          if(isset($_GET['CartID'])&&isset($_GET['PID'])){
            $sql = " DELETE FROM CART_RECORD
                     WHERE CART_RECORD.PID =".$_GET['PID'].
                     " AND ID='".$_GET['CartID']."'";
            $conn->query($sql);
            $_SESSION['AlertMsg'] =
            array('success','<i class="material-icons">done</i> 成功刪除商品！',false);
          }
        ?>
      </div>
    </div>
    <meta http-equiv="refresh" content="1000;url=cart.php" />
  </div>
  <?php include('footer.php') ?>
</body>
<!-- <script language="Javascript">
  // 返回上一頁
  setTimeout("history.back()", 10);
</script> -->
</html>
