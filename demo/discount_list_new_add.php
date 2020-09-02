<?php session_start(); ?>
<?php include('connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('style.php') ?>
  <title><?php echo  $page_name. ' - ' .title_name ?></title>
  <meta http-equiv="refresh" content="<?php echo 0 ?>;URL=discount_list.php">
  <?php require_once ('js.php') ?>
</head>

<body>
  <?php include('nav.php'); ?>
  <div class="container my-3">

    <div class="row">
      <div class="col-12 text-center">
        <?php
        //設定地點為台北時區
        date_default_timezone_set('Asia/Taipei');

        $Type=$_POST['Type'];
        $PeriodFrom=$_POST['PeriodFrom'];
        $PeriodTo=$_POST['PeriodTo'];
        $Requirement=$_POST['Requirement'];
        $Rate=$_POST['Rate'];
        $Info=$_POST['Info'];
        $EventType=$_POST['EventType'];
        $sql= "INSERT INTO DISCOUNT(Type,PeriodFrom,PeriodTo,Requirement,Rate,Info,EventType)
        VALUES('$Type','$PeriodFrom','$PeriodTo','$Requirement','$Rate','$Info','$EventType')";
        if($conn->query($sql)){
          $_SESSION['AlertMsg'] =
          array('success','<i class="material-icons">done</i> 新增成功',false);
        } else{
          $_SESSION['AlertMsg'] =
          array('danger','<i class="material-icons">block</i> 新增失敗！',false);
        }
        $conn->close();
        ?>
      </div>
    </div>

  </div>
  <?php include('footer.php') ?>
</body>
</html>
