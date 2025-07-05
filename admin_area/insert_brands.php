<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
      $brand_title = trim($_POST['brand_title']);

      // checking empty input 
      if ($brand_title == '') {
            echo "<script>alert('Please fill all the fields');</script>";
            exit();
      }
      $select_query = "select * from brands where brand_title = '$brand_title'";
      $result_select = mysqli_query($con, $select_query);
      if (mysqli_num_rows($result_select) > 0) {
            echo "<script>alert('Duplicate Brand')</script>";
      } else {
            $insert_query = "insert into brands (brand_title) values('$brand_title')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                  echo "<script> alert('Brand successfully inserted')</script>";
            }

      }
}
?>



<h2 class="text-center pb-3">Insert Brand</h2>

<form action="" method="post" class="mb-2">
      <div class="input-group w-90 mb-3">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands"
                  aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-10 mb-3">
            <input type="submit" class="bg-info border-0 p-3" value="Insert Brand" name="insert_brand">
            <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands</button> -->

      </div>


</form>