<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("./includes/connect.php");
include("./functions/common_function.php");

// <!-- calling cart function  -->
cart();
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ecommerce Practice</title>
      <!-- bootstrap -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
      <!-- font awesome  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- css file  -->
      <link rel="stylesheet" href="style.css">
      <style>
            .cart-image {
                  height: 60px;
                  width: 60px;
                  object-fit: contain;
            }
      </style>
</head>

<body>
      <!-- nav bar  -->
      <div class="container-fluid p-0 ">
            <!-- first child  -->
            <nav class="navbar navbar-expand-lg navbar-light bg-info ">
                  <div class="container-fluid">
                        <img src="./images/logo.png" alt="logo" class="logo">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                              aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                          <a class="nav-link" href="display_all_products.php">Products</a>
                                    </li>
                                    <li class="nav-item">
                                          <a class="nav-link" href="#">Register</a>
                                    </li>
                                    <li class="nav-item">
                                          <a class="nav-link" href="#">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"
                                                      aria-hidden="true"></i><sup><?php getCartDetails(); ?></sup>
                                          </a>
                                    </li>

                              </ul>
                        </div>
                  </div>
            </nav>
      </div>

      <!-- second child  -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
            <ul class="navbar-nav me-auto ">
                  <li class="nav-item">
                        <a class="nav-link" href="#">Welcome Guest</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                  </li>
            </ul>
      </nav>
      <!-- third child  -->
      <div class="bg">
            <h3 class="text-center">Welcome to this Store</h3>
            <p class="text-center">Communication is the heart of E-commerce and community</p>
      </div>

      <!-- fourth child or cart items     -->
      <form action="" method="post">
            <div class="container  mt-3">
                  <div class="row">
                        <table class="table table-bordered text-center">

                              <!-- fetching cart data  -->
                              <?php
                              global $con;
                              $get_ip_add = get_client_ip();
                              $total = 0;

                              $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                              $result = mysqli_query($con, $cart_query);

                              $total_rows = mysqli_num_rows($result);
                              if ($total_rows > 0) {
                                    echo "
                                    <thead>
                                    <tr>
                                          <th>Title</th>
                                          <th>Image</th>
                                          <th>Quantity</th>
                                          <th>Total Price</th>
                                          <th>Remove</th>
                                          <th colspan='2'>Operations</th>
                                    </tr>
                              </thead>
                              <tbody>";
                                    while ($row = mysqli_fetch_array($result)) {
                                          $product_id = $row['product_id'];
                                          $select_products = "Select * from `products` where p_id='$product_id'";
                                          $result_products = mysqli_query($con, $select_products);

                                          while ($row_product_price = mysqli_fetch_array($result_products)) {

                                                // convert this 138,00 to 138,000  
                                                $clean_price = array((int) str_replace(',', '', $row_product_price['p_price']));
                                                $p_price = $row_product_price['p_price'];
                                                $p_title = $row_product_price['p_title'];
                                                $p_image1 = $row_product_price['p_image1'];

                                                $product_values = array_sum($clean_price);
                                                $total += $product_values;

                                                ?>
                                                <tr>
                                                      <td><?php echo $p_title ?></td>
                                                      <td><img src="./admin_area/product_images/<?php echo $p_image1 ?>"
                                                                  class="cart-image" alt=""></td>
                                                      <td><input type="text" class="form-input w-50" name="qty"></td>
                                                      <?php
                                                      $get_ip_add = get_client_ip();
                                                      if (isset($_POST['update_cart'])) {
                                                            $quantities = $_POST['qty'];
                                                            // if ($quantities != '') {
                                                            //       $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
                                                            //       mysqli_query($con, $update_cart);
                                                            //       // Optionally recalculate total
                                                            //       $total = $total * $quantities;
                                                            // } else {
                                                            //       echo "<script>alert('Invalid quantity');</script>";
                                                            // }
                                                            $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                                                            $result_update = mysqli_query($con, $update_cart);
                                                            $total = $total * $quantities;
                                                      }

                                                      ?>
                                                      <td><?php echo $p_price . '/-' ?></td>
                                                      <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                                                      </td>
                                                      <td>
                                                            <input type="submit" name="update_cart" class="btn bg-primary border-0"
                                                                  value="Update Cart">
                                                      </td>
                                                      <td>
                                                            <!-- <button class="btn bg-danger border-0">Delete</button> -->
                                                            <input type="submit" name="remove_cart" class="btn bg-danger border-0"
                                                                  value="Remove Cart">
                                                      </td>
                                                </tr>
                                                <?php
                                          }
                                    }
                              } else {
                                    echo "<h3 class='text-center text-danger'>Cart is empty</h3>";
                              }
                              ?>
                              </tbody>
                        </table>
                  </div>
                  <div class="d-flex mb-4 py-2">
                        <?php
                        global $con;
                        $get_ip_add = get_client_ip();

                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);

                        $total_rows = mysqli_num_rows($result);
                        if ($total_rows > 0) {
                              ?>
                              <h4 class="tx-3">Subtotal: <strong class="text-info">Rs. <?php echo $total ?>/-</strong></h4>
                              <a href="index.php" class="btn bg-info border-0 mx-3">Continue Shopping</a>

                              <a href="./user_area/checkout.php" class="btn bg-success border-0">Checkout</a>

                              <?php
                        } else {
                              ?>
                              <a href="index.php" class="btn bg-info border-0 mx-3">Continue Shopping</a>

                              <?php
                        }
                        ?>
                  </div>
            </div>
      </form>
      <!-- function to remove items  -->
      <?php

      function remove_cart_item()
      {
            global $con;
            if (isset($_POST['remove_cart'])) {
                  foreach ($_POST['removeitem'] as $remove_id) {
                        echo $remove_id;
                        $delete_query = "DELETE FROM cart_details WHERE product_id = $remove_id";
                        $delete_result = mysqli_query($con, $delete_query);
                        if ($delete_result) {
                              echo "<script>window.open('cart.php','_self')</script>";
                        }
                  }
            }

      }
      // echo $remove_item = remove_cart_item();
      remove_cart_item();
      ?>
      <!-- footer  -->
      <?php include("./includes/footer.php"); ?>

      <!-- bootsrap js cdn -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>