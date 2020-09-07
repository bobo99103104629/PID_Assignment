<?php
$sql="SELECT * FROM `PRODUCT` ORDER BY rand() LIMIT 1";
$result=$conn->query($sql);
$rows=mysqli_fetch_array($result);
$info = $rows['Info'];
$Name = $rows['Name'];
?>
<div class="discount" style=" background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);">
  <div class="container">
    <div class="row" style="cursor:pointer" onclick="location.href='product.php'">
      <div class="col-12 my-3 my-lg-5 text-center">
        <div class="row">
          <div class="col-12">
            <i class="material-icons text-light animated infinite rubberBand" style="font-size:5rem;">redeem</i>
          </div>
          <div class="col-12 my-3 text-center">
            <h3 class="text-light d-block " >
              <?php echo $Name ?>
            </h3>
            <h5 class="text-light my-3" style="opacity: .9">
              <?php echo $info ?>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
