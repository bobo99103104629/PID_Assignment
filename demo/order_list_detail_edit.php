<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name = '訂單提交' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('style.php') ?>
  <title><?php echo  $page_name ?></title>
  <meta http-equiv="refresh" content="<?php echo 0 ?>;URL=order_list.php?State=Submitted">
  <?php require_once ('js.php') ?>
</head>
<body>
  <?php include('nav.php') ?>
  <?php
    $state = $_POST['state'];
    $manageName = $_POST['manageName'];
    if($manageName == ''){
      $manageName = "NULL";
    }
    $ID = $_POST['ID'];

    $sql = "UPDATE ORDER_LIST SET State = '" . $state . "' WHERE ID = '" . $ID . "'";
    $result = $conn->query($sql);
    if($result === TRUE){
      $_SESSION['AlertMsg'] = array('success','<i class="material-icons">done</i> 修改成功！', false);
    }else{
      $_SESSION['AlertMsg'] = array('danger','<i class="material-icons">block</i> 修改失敗！',false);
    }

   ?>
  <?php include('footer.php') ?>
</body>
<html>
