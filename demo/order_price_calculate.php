<?php

  $FinalTotal = 0;
  $SelectCount = 0;
  // 資料庫指令
  $sql = "SELECT * FROM ORDER_LIST WHERE Date>= '2020-09-01' AND Date<='2020-12-30' AND State = 'completed'";
  $result = $conn->query($sql);

  if(mysqli_num_rows($result) == 0) {
    $Fare = 0;
    echo'
      <tr>
        <td colspan="6">沒有訂單</td>
      </tr>';
  }
  else if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_array($result)){
      $FinalTotal += $rows['FinalCost'];
    }
  }
