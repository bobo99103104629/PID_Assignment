<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name="訂單確認"?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('style.php') ?>
  <title><?php echo  $page_name ?></title>
  <?php require_once ('js.php') ?>
</head>

<body>
  <?php include('nav.php'); ?>
  <div class="container my-3">
    <div class="row" >
      <div class="col-12 text-center ">
        <?php include('echo_alert.php') ?>
        <h2 class="d-inline-block my-3" style="border-bottom:5px #333 solid;">訂單確認</h2>
        <table class="table table-bordered my-3">
          <thead class="thead-dark text-center">
            <tr>
              <th scope="col" class="text-center" style="width:8rem;"></th>
              <th scope="col">商品名稱</th>
              <th scope="col">單價</th>
              <th scope="col">數量</th>
              <th scope="col">小計</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $CartID = $_GET['CartID'];
            include 'price_calculate.php'; ?>
            <tr class="text-right">
              <td colspan="6">
                <?php
                  echo '共<strong>'.$SelectCount.'</strong>件商品　商品總金額：<strong>NT$ '.number_format($FinalTotal).'</strong></br>';
                  echo '運費小計：<strong>NT$ '.$Fare.'</strong></br>';
                    echo '<font size="+2">總金額：NT$ <strong>'.number_format($FinalTotal + $Fare).'</strong></font>';
                  $FinalTotal = $FinalTotal + $Fare;
                ?>
              </td>
            </tr>
          </tbody>
        </table>
        <?php
        if($FinalTotal > 0){
          echo'
          
          <form class="text-center" action="order_submit.php" method="post">
          <div class="container my-3">
          <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
              <div class="card">
                <div class="card-header text-center">訂單資料</div>
                <div class="card-body">
                    <div class="col-12 form-group">
                      <label>收件人姓名 <span class="text-info">*</span></label>
                      <input type="text" value="'.$user_name.'" name="pay1" placeholder="Username" maxlength="20" class="form-control" required>
                    </div> 
                    <div class="col-12 form-group">
                      <label>手機號碼 <span class="text-info">*</span></label>
                      <input type="text" value="'.$user_phone.'" name="pay2" placeholder="Phone" maxlength="10" class="form-control" required>
                    </div>   
                    <div class="col-12 form-group">
                      <label>配送地址 <span class="text-info">*</span></label>
                      <input type="text" value="'.$user_address.'" name="payson" placeholder="Address" maxlength="100" class="form-control" >
                    </div>         
            <input type="hidden" name="CartID" value="'.$CartID.'">
            <input type="hidden" name="Total" value="'.$FinalTotal.'">
            <button class="btn btn-outline-dark mr-3 " type="submit"><i class="material-icons">check</i> 提交訂單</button>
            <button type="button" class="btn btn-outline-dark" onclick="location.href=\'order_del.php?CartID='.$CartID.'\'" >
              <i class="material-icons">clear</i> 取消訂單
            </button>
            </div>
            </div>
          </form>';
        } else{
          die ('<meta http-equiv="refresh" content="0;URL=cart.php">');
        }
        ?>
      </div>
    </div>
  </div>
  <?php include('footer.php') ?>
</body>

</html>
