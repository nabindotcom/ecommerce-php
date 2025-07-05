<?php
include('../includes/connect.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['insert_ptype'])) {
      $ptype_title = trim($_POST['ptype_title']);

      if ($ptype_title == '') {
            echo "<script>alert('Please fill all the fields');</script>";
            exit();
      }
      //selection data from databse
      $select_query = "select * from `product_type` where ptype_title = '$ptype_title'";
      $result_select = mysqli_query($con, $select_query);

      if (mysqli_num_rows($result_select) > 0) {
            echo "<script> alert('Dublicate Product Type')</script>";

      } else {
            $insert_query = "insert into product_type (ptype_title) values ('$ptype_title')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                  echo "<script> alert('successfully inserted')</script>";
            } else {
                  echo "error";
            }
      }
}
?>
<h2 class="text-center pb-3">Insert Product Type</h2>
<form action="" method="post" class="mb-2">
      <div class="input-group w-90 mb-3">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="ptype_title" placeholder="Insert product type"
                  aria-label="product_type" aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-10 mb-3">
            <input type="submit" class="bg-info p-2 my-3 border-0" value="Insert Product Type" name="insert_ptype">
            <!-- <button class="bg-info p-2 my-3 border-0">Insert Product Type</button> -->

      </div>


</form>