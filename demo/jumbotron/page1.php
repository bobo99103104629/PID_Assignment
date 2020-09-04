<!-- 隨機展示熱銷商品 -->
<div class="row">
  <?php
  $sql="SELECT * FROM PRODUCT_VIEW ORDER BY RAND() LIMIT 4";
  $result=$conn->query($sql)
  ?>
  <div class="col-12 my-3 my-lg-5 text-center">
    <div class="row">
      <div class="col-12 mb-4">
        <h2 class="d-inline " style="border-bottom:5px #333 solid;">熱銷商品</h2>
      </div>
      <?php
      while($rows=mysqli_fetch_array($result)){
       
          $price_text='<span class="badge badge-primary ">NT$ ' . $rows['PPrice'] . '</span> ';
        

        echo '<div class="col-12 col-lg text-center my-3 link" onclick="location.href=\'product_detail.php?ID=' . $rows['PID'].'\'">
          <img src="' . $rows['PImg'] . '" class="img-fluid mx-auto d-block mb-2" style="height:8rem;width:auto;">
          <h5 class="text-truncate">'. $rows['PName'] . '</h5>'
          . $price_text .
        '</div>';
      }
      ?>
    </div>
  </div>
</div>

<!-- 巨大登入按鈕 -->
<div class="row  <?php if(isset($_SESSION['ID']))echo'd-none ' ?>">
  <div class="col-12 col-lg-7">
    <?php $bg_url='img/1.jpg' ; ?>
    <div class="jumbotron text-center bg-dark text-light" style="background:url('<?php echo $bg_url ?>');background-size: cover; background-position:center center;" >
      <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#loginModal">登入</button>
    </div>
  </div>
  <div class="col-12 col-lg-5">
    <?php $bg_url='img/2.jpg' ; ?>
    <div class="jumbotron text-center bg-light text-dark" style="background:url('<?php echo $bg_url ?>');background-size: cover; background-position:center center; " >
      <button type="button" class="btn btn-dark" onclick="location.href='reg.php'">註冊</button>
    </div>
  </div>
</div>
