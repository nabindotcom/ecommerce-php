<?php
// include('../includes/connect.php');
// getting product
function getProduct()
{
      if (!isset($_GET["ptype"])) {
            if (!isset($_GET["brand"])) {
                  global $con;
                  $products_select_query = "SELECT * FROM products ORDER BY rand() LIMIT 0,2";
                  $product_select_result = mysqli_query($con, $products_select_query);
                  while ($row = mysqli_fetch_assoc($product_select_result)) {
                        // echo $row['p_title'];
                        ?>
                        <div class="col-md-4">
                              <div class="card" id="<?php echo $row['p_id']; ?>">
                                    <img src="./admin_area/product_images/<?php echo $row['p_image1']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                          <h5 class="card-title"><?php echo $row['p_title']; ?></h5>
                                          <p class="card-text"><?php echo $row['p_description']; ?></p>
                                          <p class="card-text"><?php echo "Rs." . $row['p_price'] . "/-"; ?></p>
                                          <a href="index.php?add_to_cart=<?php echo $row['p_id']; ?>" class="btn btn-info">Add To Cart</a>

                                          <a href="./product_details.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-secondary">View
                                                More</a>

                                    </div>
                              </div>
                        </div>
                        <?php
                  }
            }
      }
}
// getting all product
function getAllProduct()
{
      if (!isset($_GET["ptype"])) {
            if (!isset($_GET["brand"])) {
                  global $con;
                  $products_select_query = "SELECT * FROM products ORDER BY rand()";
                  $product_select_result = mysqli_query($con, $products_select_query);
                  while ($row = mysqli_fetch_assoc($product_select_result)) {
                        // echo $row['p_title'];
                        ?>
                        <div class="col-md-4">
                              <div class="card" id="<?php echo $row['p_id']; ?>">
                                    <img src="./admin_area/product_images/<?php echo $row['p_image1']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                          <h5 class="card-title"><?php echo $row['p_title']; ?></h5>
                                          <p class="card-text"><?php echo $row['p_description']; ?></p>
                                          <a href="index.php?add_to_cart=<?php echo $row['p_id']; ?>" class="btn btn-info">Add To Cart</a>
                                          <a href="./product_details.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-secondary">View
                                                More</a>

                                    </div>
                              </div>
                        </div>
                        <?php
                  }
            }
      }
}
// getting unique product type
function getUniqueProduct()
{
      if (isset($_GET["ptype"])) {
            global $con;
            $ptype = $_GET['ptype'];
            $products_select_query = "SELECT * FROM products WHERE ptype_id=$ptype";
            $product_select_result = mysqli_query($con, $products_select_query);
            $total_rows = mysqli_num_rows($product_select_result);
            if ($total_rows == 0) {
                  echo "<h2 class='text-center text-danger'>No stock on this product type.</h2>";
            }
            while ($row = mysqli_fetch_assoc($product_select_result)) {
                  // echo $row['p_title'];
                  ?>
                  <div class="col-md-4">
                        <div class="card" id="<?php echo $row['p_id']; ?>">
                              <img src="./admin_area/product_images/<?php echo $row['p_image1']; ?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['p_title']; ?></h5>
                                    <p class="card-text"><?php echo $row['p_description']; ?></p>
                                    <a href="index.php?add_to_cart=<?php echo $row['p_id']; ?>" class="btn btn-info">Add To Cart</a>
                                    <a href="./product_details.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-secondary">View
                                          More</a>

                              </div>
                        </div>
                  </div>
                  <?php
            }
      }
}
// getting unique brand
function getUniqueBrand()
{
      if (isset($_GET["brand"])) {
            global $con;
            $brand = $_GET['brand'];
            $products_select_query = "SELECT * FROM products WHERE brand_id=$brand";
            $product_select_result = mysqli_query($con, $products_select_query);
            $total_rows = mysqli_num_rows($product_select_result);
            if ($total_rows == 0) {
                  echo "<h2 class='text-center text-danger'>No stock on this Brand.</h2>";
            }
            while ($row = mysqli_fetch_assoc($product_select_result)) {
                  // echo $row['p_title'];
                  ?>
                  <div class="col-md-4">
                        <div class="card" id="<?php echo $row['p_id']; ?>">
                              <img src="./admin_area/product_images/<?php echo $row['p_image1']; ?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['p_title']; ?></h5>
                                    <p class="card-text"><?php echo $row['p_description']; ?></p>
                                    <a href="index.php?add_to_cart=<?php echo $row['p_id']; ?>" class="btn btn-info">Add To Cart</a>
                                    <a href="./product_details.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-secondary">View
                                          More</a>

                              </div>
                        </div>
                  </div>
                  <?php
            }
      }
}
//getting product type 
function getProductType()
{
      global $con;
      $select_query = "SELECT * FROM product_type order by ptype_title";
      $select_result = mysqli_query($con, $select_query);
      // $row_data = mysqli_fetch_assoc($select_result);
      // echo $row_data['ptype_title'];
      while ($row_data = mysqli_fetch_assoc($select_result)) {
            $ptype_id = $row_data['ptype_id'];
            $ptype_title = $row_data['ptype_title'];

            echo "<li class='nav-item'> <a href='index.php?ptype=$ptype_id' class='nav-link text-light'>$ptype_title</a></li>";

      }
}

//getting brand
function getBrand()
{
      global $con;
      $select_brand = "SELECT * FROM brands ORDER BY brand_title";
      $brand_result = mysqli_query($con, $select_brand);
      // $row_data = mysqli_fetch_assoc($select_result);
      // echo $row_data['ptype_title'];
      while ($row_data = mysqli_fetch_assoc($brand_result)) {
            $brand_id = $row_data['brand_id'];
            $brand_title = $row_data['brand_title'];

            echo "<li class='nav-item'> <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>";

      }


}

//getting search product
function getSearchProduct()
{
      if (isset($_GET['search_data_product'])) {
            if (trim($_GET['search_value']) == '') {
                  echo "<script>alert('Please insert a search value'); window.history.back();</script>";
                  return;

            } else {
                  $search_value = $_GET['search_value'];
                  global $con;
                  $search_query = "SELECT * FROM products WHERE p_keywords LIKE '%$search_value%'";
                  $product_select_result = mysqli_query($con, $search_query);

                  // checking product exits or not 
                  $total_rows = mysqli_num_rows($product_select_result);
                  if ($total_rows == 0) {
                        echo "<h3 class='text-center text-danger'>There is not any product like <span class='text-info'>'$search_value'</span></h3>";
                  }

                  while ($row = mysqli_fetch_assoc($product_select_result)) {
                        // echo $row['p_title'];
                        ?>
                        <div class="col-md-4">
                              <div class="card" id="<?php echo $row['p_id']; ?>">
                                    <img src="./admin_area/product_images/<?php echo $row['p_image1']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                          <h5 class="card-title"><?php echo $row['p_title']; ?></h5>
                                          <p class="card-text"><?php echo $row['p_description']; ?></p>
                                          <a href="index.php?add_to_cart=<?php echo $row['p_id']; ?>" class="btn btn-info">Add To Cart</a>
                                          <a href="./product_details.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-secondary">View
                                                More</a>
                                    </div>
                              </div>
                        </div>
                        <?php
                  }
            }
      }
}

//getting product details (view Product)
function getProductDetails()
{
      if (isset($_GET['p_id'])) {
            if (!isset($_GET["ptype"])) {
                  if (!isset($_GET["brand"])) {
                        $p_id = $_GET['p_id'];
                        global $con;
                        $products_select_query = "SELECT * FROM products WHERE p_id = '$p_id'";
                        $product_select_result = mysqli_query($con, $products_select_query);
                        while ($row = mysqli_fetch_assoc($product_select_result)) {
                              // echo $row['p_title'];
                              ?>
                              <div class="col-md-4">
                                    <div class="card" id="<?php echo $row['p_id']; ?>">
                                          <img src="./admin_area/product_images/<?php echo $row['p_image1']; ?>" class="card-img-top" alt="...">
                                          <div class="card-body">
                                                <h5 class="card-title"><?php echo $row['p_title']; ?></h5>
                                                <p class="card-text"><?php echo $row['p_description']; ?></p>
                                                <a href="index.php?add_to_cart=<?php echo $row['p_id']; ?>" class="btn btn-info">Add To Cart</a>
                                                <a href="index.php" class="btn btn-secondary">Go Home</a>

                                          </div>
                                    </div>
                              </div>
                              <div class="col-md-8">
                                    <!-- card images   -->
                                    <div class="row">

                                          <div class="col-md-12 ">
                                                <h4 class="text-center text-info">Related Product's Images</h4>
                                          </div>
                                          <div class="col-md-6">
                                                <img src="./admin_area/product_images/<?php echo $row['p_image2']; ?>" class="card-img-top" alt="...">

                                          </div>
                                          <div class="col-md-6">
                                                <img src="./admin_area/product_images/<?php echo $row['p_image3']; ?>" class="card-img-top" alt="...">

                                          </div>
                                    </div>

                              </div>
                              <?php
                        }
                  }

            }
      }
}

// Function to get the client IP address
function get_client_ip()
{
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
      else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
      else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
      else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
      else
            $ipaddress = 'UNKNOWN';
      return $ipaddress;
}

// Cart function
function cart()
{
      if (isset($_GET["add_to_cart"])) {
            // echo "Triggered cart for product: " . $_GET["add_to_cart"]; // 👈 TEST OUTPUT
            global $con;
            $ip = get_client_ip();
            $get_product_id = $_GET["add_to_cart"];


            $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' AND product_id = '$get_product_id'";
            $result = mysqli_query($con, $select_query);
            $total_rows = mysqli_num_rows($result);

            if ($total_rows > 0) {
                  echo "<script>alert('This item is already present inside cart')</script>";
                  // echo "<script>window.open('index.php','_self')</script>";
                  echo "<script>window.open('index.php','_self')</script>";

            } else {
                  $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ('$get_product_id', '$ip', 1)";
                  $result_query = mysqli_query($con, $insert_query);
                  echo "<script>window.open('index.php','_self')</script>";
            }

      }
}
// Cart Detais
function getCartDetails()
{
      if (isset($_GET["add_to_cart"])) {
            // echo "Triggered cart for product: " . $_GET["add_to_cart"]; // 👈 TEST OUTPUT
            global $con;
            $ip = get_client_ip();

            $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' ";
            $result = mysqli_query($con, $select_query);
            $count_items = mysqli_num_rows($result);
      } else {
            global $con;
            $ip = get_client_ip();
            $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' ";
            $result = mysqli_query($con, $select_query);
            $count_items = mysqli_num_rows($result);
      }
      echo $count_items;
}

// total price function
function total_cart_price()
{
      global $con;
      $get_ip_add = get_client_ip();
      $total = 0;

      $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
      $result = mysqli_query($con, $cart_query);

      while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $select_products = "Select * from `products` where p_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);

            while ($row_product_price = mysqli_fetch_array($result_products)) {
                  // convert this 138,00 to 138,000  
                  $clean_product_price = array((int) str_replace(',', '', $row_product_price['p_price']));
                  $product_values = array_sum($clean_product_price);
                  $total += $product_values;
            }
      }

      echo $total;
}


?>