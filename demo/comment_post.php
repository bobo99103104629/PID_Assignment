<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name = '所有商品' ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- 引入CSS等樣式內容 -->
  <?php include('style.php') ?>
  <title><?php echo  $page_name ?></title>
  <meta http-equiv="refresh" content="<?php echo 0 ?>;URL=product_detail.php<?php echo '?ID='.$_POST['PID']?>">
  <?php require_once ('js.php') ?>
</head>

<body>
  <!-- 引入導覽列 -->
  <?php include('nav.php') ?>
  <div class="container my-3">
    <div class="row">
      <div class="col-12">
      <?php
      //設定地點為台北時區
        date_default_timezone_set('Asia/Taipei');
      $CID= $user_id;
      $PID= $_POST['PID'];
      $Date = date("Y/m/d H:i:s");//取得年份/月/日 時:分:秒
      $Comment= $_POST['Comment'];
      $Star= $_POST['Star'];
      $sql="INSERT INTO COMMENT(CID,PID,Star,Date,Comment)
      VALUE('$CID',$PID,'$Star','$Date','$Comment')" ;
      if ($conn->query($sql)===true) {
        $_SESSION['AlertMsg'] =
        array('success','<i class="material-icons">check</i> 成功發表評論！',false);
      } else {
        echo $conn->error . "<br>";
      }
      ?>
      </div>
    </div>
  </div>
  <?php include('footer.php') ?>
</body>
<!-- 引入JS -->

</html>
