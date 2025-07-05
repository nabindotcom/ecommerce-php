<?php
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
                              <form class="d-flex" role="search" method="GET" action="search_product.php">
                                    <input class="form-control me-2" type="search" name="search_value"
                                          placeholder="Search Product" aria-label="Search" />
                                    <input type="submit" value="search" name="search_data_product"
                                          class="btn btn-outline-light">
                              </form>
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
                        <a class="nav-link" href="./user_area/user_login.php">Login</a>

                  </li>
            </ul>
      </nav>
      <!-- third child  -->
      <div class="bg">
            <h3 class="text-center">Welcome to this Store</h3>
            <p class="text-center">Communication is the heart of E-commerce and community</p>
      </div>

      <!-- fourth child -->
      <div class="row">
            <!-- sidenav  -->
            <div class="col-md-2 bg-secondary p-0">
                  <!-- Product Type  -->
                  <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                              <h4><a href="#" class="nav-link text-light ">Product Type</a></h4>
                        </li>
                        <?php

                        getProductType();

                        ?>
                  </ul>
                  <!-- Brands  -->
                  <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                              <h4><a href="#" class="nav-link text-light ">Brands</a></h4>
                        </li>
                        <?php

                        getBrand()

                              ?>
                  </ul>
            </div>
            <!-- products  -->
            <div class="col-md-10">
                  <div class="row">
                        <?php
                        getSearchProduct();
                        getUniqueProduct();
                        getUniqueBrand();
                        ?>
                  </div>
            </div>
      </div>

      <!-- footer  -->
      <?php include("./includes/footer.php"); ?>

      <!-- bootsrap js cdn -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js
"></script>
</body>

</html>