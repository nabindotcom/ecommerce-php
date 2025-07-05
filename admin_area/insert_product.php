<?php
include("../includes/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['insert_product'])) {
      $p_title = $_POST['p_title'];
      $p_description = $_POST['p_description'];
      $p_keywords = $_POST['p_keywords'];
      $p_type = $_POST['p_type'];
      $p_brand = $_POST['p_brand'];
      $p_price = $_POST['p_price'];
      $status = "true";

      // accessing images
      $p_image1 = $_FILES['p_image1']['name'];
      $p_image2 = $_FILES['p_image2']['name'];
      $p_image3 = $_FILES['p_image3']['name'];

      // accessing image temp name
      $temp_image1 = $_FILES['p_image1']['tmp_name'];
      $temp_image2 = $_FILES['p_image2']['tmp_name'];
      $temp_image3 = $_FILES['p_image3']['tmp_name'];

      if ($p_title == '' || $p_description == '' || $p_keywords == '' || $p_type == '' || $p_brand == '' || $p_price == '' || $p_image1 == '' || $p_image2 == '' || $p_image3 == '') {
            echo "<script>alert('please fill all the fields')</script>";
            // exit();
      } else {
            move_uploaded_file($temp_image1, "./product_images/$p_image1");
            move_uploaded_file($temp_image2, "./product_images/$p_image2");
            move_uploaded_file($temp_image3, "./product_images/$p_image3");

            // inserting data to database 
            $insert_query = "INSERT INTO products (p_title, p_description, p_keywords, ptype_id, brand_id, p_image1, p_image2, p_image3, p_price,date, status) VALUES ('$p_title', '$p_description', '$p_keywords', '$p_type', '$p_brand', '$p_image1', '$p_image2', '$p_image3', '$p_price', NOW(), '$status')";

            $insert_result = mysqli_query($con, $insert_query);
            if ($insert_result) {
                  echo "<script>alert('product inserted successfully')</script>";

            }
      }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Insert-Product</title>
      <!-- bootstrap -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
      <!-- font awesome  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- css file  -->
      <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
      <div class="container mt-3">
            <h2 class="text-center">Insert Product</h2>
            <form action="" method="post" enctype="multipart/form-data">
                  <!-- p_title  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <label for="p_title" class="form-label">Product Title</label>
                        <input type="text" id="p_title" name="p_title" class="form-control"
                              placeholder="Enter product title" required autocomplete="off">
                  </div>
                  <!-- p_description  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <label for="p_description" class="form-label">Product Description</label>
                        <input type="text" id="p_description" name="p_description" class="form-control"
                              placeholder="Enter product description" required autocomplete="off">
                  </div>
                  <!-- p_keywords  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <label for="p_keywords" class="form-label">Product Keywords</label>
                        <input type="text" id="p_keywords" name="p_keywords" class="form-control"
                              placeholder="Enter product keywords" required autocomplete="off">
                  </div>
                  <!-- p_type  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <select name="p_type" id="p_type" class="form-select">
                              <option value="">Select a Product Type</option>

                              <?php
                              $select_query = "SELECT * FROM product_type";
                              $select_result = mysqli_query($con, $select_query);

                              while ($row_data = mysqli_fetch_assoc($select_result)) {
                                    $ptype_id = $row_data['ptype_id'];
                                    $ptype_title = $row_data['ptype_title'];

                                    echo "<option value='$ptype_id'>$ptype_title</option>";
                              }
                              ?>
                        </select>
                  </div>
                  <!-- p_brand  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <select name="p_brand" id="p_brand" class="form-select">
                              <option value="">Select a Product Brand</option>
                              <?php

                              $select_brand = "SELECT * FROM brands";
                              $brand_result = mysqli_query($con, $select_brand);

                              while ($row_data = mysqli_fetch_assoc($brand_result)) {
                                    $brand_id = $row_data['brand_id'];
                                    $brand_title = $row_data['brand_title'];

                                    echo "<option value='$brand_id'>$brand_title</option>";

                              }
                              ?>
                        </select>
                  </div>
                  <!-- p_image1  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <label for="p_image1" class="form-label">Product Image1</label>
                        <input type="file" id="p_image1" name="p_image1" class="form-control" required>
                  </div>
                  <!-- p_image2  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <label for="p_image2" class="form-label">Product Image2</label>
                        <input type="file" id="p_image2" name="p_image2" class="form-control" required>
                  </div>
                  <!-- p_image3  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <label for="p_image3" class="form-label">Product Image3</label>
                        <input type="file" id="p_image3" name="p_image3" class="form-control" required>
                  </div>
                  <!-- p_price  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <label for="p_price" class="form-label">Product Price</label>
                        <input type="text" id="p_price" name="p_price" class="form-control"
                              placeholder="Enter product price" required autocomplete="off">
                  </div>
                  <!-- submit-btn  -->
                  <div class="form-outline w-50 m-auto mb-4">
                        <input type="submit" value="Insert Product" name="insert_product" class="btn bg-info mb-3 ">
                  </div>
            </form>
      </div>
</body>

</html>