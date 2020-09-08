<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name = '訂單資訊' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('style.php') ?>
  <title><?php echo  $page_name ?></title>
  <?php
  if(!($user_position=='A'||$user_position=='S'))
    die ('<meta http-equiv="refresh" content="0;URL=index.php">');
  ?>
  <?php require_once ('js.php') ?>
</head>
<body>
  <?php include('nav.php');
  //----------------------From order_list----------------
  $sql = "SELECT * FROM ORDER_LIST_VIEW WHERE ID = '" . $_GET['ID'] . "'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);

  $ID = $row['ID'];
  $memName = $row['memName'];
  $Date = $row['Date'];
  $Phone = $row['Phone'];
  $mail = $row['Email'];
  $FinalCost = $row['FinalCost'];
  $State = $row['State'];
  $Address = $row['Address'];

  //---------------------From member----------------
  $sqlName = "SELECT * FROM MEMBER WHERE position != \"C\"";
  $resultName = $conn->query($sqlName);

  //----------------------From member assign name----------------


  $stateStr = array("submitted", "processed", "delivered", "completed");
  $attr = array("ID", "收件人", "mail", "電話", "地址", "訂單時間", "金額");
  $attrValue = array("$ID", "$memName", "$mail", "$Phone", "$Address", "$Date", "$FinalCost");
  $attrSize = count($attr);
  $isDisplay = '';
  $idColSize = '';
  if($user_position == "A"){
    $attrSize = count($attr) - 1;
    $idColSize = 'col-6';
  }else{
    $isDisplay = 'd-none';
    $idColSize = 'col-12';
}

  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="card bg-light mt-3">
          <div class="card-header text-center">訂單資訊</div>
          <div class="card-body">
            <form class="" action="order_list_detail_edit.php" method="post">
              <?php
              for ($x = 0 ; $x < $attrSize ; $x++) {
                echo '
                <div class="form-group row">
                  <label class="col-2 col-form-label font-weight-bold">' .$attr[$x]. '</label>
                  <div class="col-10">
                    <input type="text" size="70" readonly class="form-control-plaintext" value="' . $attrValue[$x] . '">
                  </div>
                </div>';
              }
               ?>
              <div class="row">
                <div class="form-group col-12">
                  <label for="inputState" class="font-weight-bold">State</label>
                  <select class="form-control" name="state">
                    <?php
                    foreach ($stateStr as $value){
                      if($value !== $State){
                        echo "<option>$value</option>";
                      }else{
                        echo "<option selected>$value</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <?php include('order_list_detail_table.php'); ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php') ?>
</body>
<html>
