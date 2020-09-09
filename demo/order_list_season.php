<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name = '當月訂單' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('style.php') ?>
  <title><?php echo  $page_name ?></title>
  <?php
  $date=date('Y-m-01', strtotime(date("Y-m-d")));
  $date2=date('Y-m-01', strtotime(date("Y-m-d")));
  $date3= date('Y-m-d', strtotime("$date2 +1 month -1 day"));
  // $date3=date("Y-m-d", strtotime($date3."+1 month"));
  // echo $date2;
  // echo $date3;
  if(!($user_position=='A'||$user_position=='S'))
    die ('<meta http-equiv="refresh" content="0;URL=index.php">');
  ?>
  <?php require_once ('js.php') ?>
</head>
<body>
  <?php include('nav.php');
  $sql = "SELECT * FROM ORDER_LIST WHERE Date>= '$date2' AND Date<='$date3' AND State = 'completed'";
  $result = $conn->query($sql);
  $sql = "SELECT COUNT(*)  COUNT FROM ORDER_LIST WHERE Date>= '$date2' AND Date<='$date3' AND State = 'completed'";
  $rows = mysqli_fetch_array($conn->query($sql));
  $aaa = $rows['COUNT'];
  ?>
  
  <div class="container mt-3"><?php include('echo_alert.php') ?></div>
  <div class="container">
    <div class="row mt-4">
    <div class="col text-center">
        <button type="button" class="btn btn-outline-dark btn-block <?=($state=='')?'active':''?>" onclick="javascript:location.href='order_list_season.php?'">當月訂單</button>
      </div>
    </div>
    <div class="row">
      <table class="table mt-4 d-none d-lg-table ">
        <thead>
          <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">總金額</th>
            <th scope="col">狀態</th>
            <th scope="col">收件人</th>
            <th scope="col">查閱</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
              echo
              '<tr class="text-center">
              <td>' . $row["ID"] . '</td>
              <td>' . $row["Date"] . '</td>
              <td>' . $row["FinalCost"] . '</td>
              <td>' . $row["State"] . '</td>
              <td>' . $row['oName'] . '</td>
              <td> 
              <button type="button" class="btn btn-primary" onclick="location.href=\'order_list_detail.php?ID=' .$row["ID"].'\'"> 查閱 </button> 
              </td>
              </tr>';
            }
          }
          ?>
          <tbody>
            <?php include 'order_price_calculate.php'; ?>
            <tr class="text-right">
              <td colspan="6">
                <?php
                  echo '共<strong>'.$aaa.'</strong>個訂單　</br>';
                    echo '<font size="+2">當前月收入：NT$ <strong>'.number_format($FinalTotal).'</strong></font>';

                ?>
              </td>
            </tr>
          </tbody>
        </tbody>
      </table>
    </div>
  </div>
  <?php include('footer.php') ?>
</body>
<html>
