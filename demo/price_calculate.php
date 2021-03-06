<?php
  // 印出cart.php的各個商品
  function EchoCartItem($img, $PName,  $cost, $CRQ,  $CartID, $PID){
    return '<tr class="text-lg-center" >
            <th>
              <img src="'.$img.'" class="img-fluid " style="max-height:5rem;">
            </th>
            <th scope="row" class="text-left align-middle">'.$PName.'</br></th>
            <th class="align-middle">NT$ '.number_format($cost).'</th>
            <th class="align-middle">'.$CRQ.'</th>
            <th class="align-middle">NT$ '.number_format($cost* $CRQ).'</th>
            <th class="align-middle">
              <a class="btn btn-outline-dark" href="cart_del.php?CartID='.$CartID.'&PID='.$PID.'"><i class="material-icons">delete</i></a>
            </th>
          </tr>';
  }

  // 印出order.php的各個商品
  function EchoOrderItem($img, $PName, $cost, $CRQ, $CartID, $PID){
    return '<tr class="text-lg-center" >
            <th>
              <img src="'.$img.'" class="img-fluid " style="max-height:5rem;">
            </th>
            <th scope="row" class="text-left align-middle">'.$PName.'</br></th>
            <th class="align-middle">NT$ '.number_format($cost).'</th>
            <th class="align-middle">'.$CRQ.'</th>
            <th class="align-middle">NT$ '.number_format($cost * $CRQ).'</th>
          </tr>';
  }
  $IniTotal = 0;
  $FinalTotal = 0;
  $SelectCount = 0;
  $Fare = 60;
  // 資料庫指令
  $sql = "SELECT P.PID PID, P.PImg PIMG, P.PName PName, P.PPrice PPrice,
          CR.Quantity CRQ
          FROM CART C
          JOIN CART_RECORD CR ON C.ID = CR.ID
          JOIN PRODUCT_VIEW P ON CR.PID = P.PID
          WHERE C.ID='".$CartID."'";
  $result = $conn->query($sql);

  if(mysqli_num_rows($result) == 0) {
    $Fare = 0;
    echo'
      <tr>
        <td colspan="6">您尚未選購產品</td>
      </tr>';
  }
  else if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_array($result)){
      $cost =  $rows['PPrice'];
      $SelectCount += $rows['CRQ']; // 總商品數量
      $FinalTotal += $cost*$rows['CRQ'];
      if($this_page == "cart")
        echo EchoCartItem($rows['PIMG'], $rows['PName'], $cost, $rows['CRQ'], $CartID, $rows['PID']);
      else if($this_page == "order")
        echo EchoOrderItem($rows['PIMG'], $rows['PName'], $cost, $rows['CRQ'], $CartID, $rows['PID']);
    }
  }
