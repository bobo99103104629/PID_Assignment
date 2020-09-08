<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php $page_name = '新增商品' ?>
<!DOCTYPE html>
<html>
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
  <?php include('nav.php'); ?>
  <?php
  include ('connection.php');
  // for product
  $sql = "SELECT * FROM PRODUCT WHERE ID = " . $_GET['ID'];
  $result = $conn -> query($sql);
  $row = mysqli_fetch_array($result);
  $name = $row['Name'];
  $stockNum = $row['Stock'];
  $price = $row['Price'];
  $description = $row['Info'];
  $Img = $row['Img'];
  $CategoryName = $row['CategoryName'];
  $State = $row['State'];



  // for stock type
  $discountType = ["in_stock", "out_of_stock", "removed_from_shelves"];

  ?>
  <div class="container">
    <div class="row">

      <div class="col-6 offset-3 mt-5">
        <div class="card">
          <div class="card-header text-center">修改商品</div>
          <div class="card-body">
            <form class="row" action="product_list_detail_edit.php" method="post" enctype="multipart/form-data" >
              <div class="col-12 form-group">
                <label for="">名稱 <span class="text-info">*</span></label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" >
              </div>
              <div class="col-12 form-group">
                <label for="">庫存狀態 <span class="text-info">*</span></label>
                <select class="form-control" name="stock" >
                  <?php
                  foreach ($discountType as $key=>$value) {
                    if($value == $State){
                      echo "<option selected=\"selected\" value = " . $value . ">" . $value . "</option>";
                    }else{
                      echo "<option value = " . $value . ">" . $value . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-12 col-lg-6 form-group">
                <label for="">庫存數量 <span class="text-info">*</span></label>
                <input type="number" name="stockNum" class="form-control" value = "<?php echo $stockNum; ?>" >
              </div>
              <div class="col-12 col-lg-6 form-group">
                <label for="">價錢 <span class="text-info">*</span></label></label>
                <input type="number" name="price" class="form-control" value = "<?php echo $price?>" >
              </div>
              <div class="col-12 col-lg-6 form-group">
                <label for="exampleFormControlFile1">上傳圖片</label>
                <input type="file" class="form-control-file" name="file" >
              </div>
              <div class="col-12 form-group">
                <label for="">商品描述 <span class="text-info">*</span></label>
                <textarea class="form-control" name="description" rows="3" ><?php echo $description ?></textarea>
              </select>
            </div>
            <div class="col-12 form-group">
              <input type="hidden" name="IDnum" value="<?php echo $_GET['ID'] ?>">
              <button class="btn btn-success btn-block" type="submit" >立即修改</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</body>
