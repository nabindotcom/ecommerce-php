<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Adming Dashboard</title>
      <!-- bootstrap -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
      <!-- css file  -->
      <link rel="stylesheet" href="../style.css">
      <link rel="stylesheet" href="style.css">
      <style>
            .footer {
                  position: absolute;
                  width: 100%;
                  bottom: 0;
            }
      </style>
</head>

<body>
      <!-- first child  -->
      <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                  <div class="container-fluid">
                        <img src="../images/logo.png" alt="logo" class="logo">
                        <nav class="navbar navbar-expand-lg ">
                              <ul class="navbar-nav">
                                    <div class="nav-item">
                                          <a href="#" class="nav-link">Welcome Guest</a>
                                    </div>
                              </ul>
                        </nav>
                  </div>
            </nav>
      </div>
      <!-- second child  -->
      <div class="bg-light">
            <h3 class="text-center p-3">Manage Details</h3>
      </div>
      <!-- third child  -->
      <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center justify-content-center gap-4">
                  <div class="p-1">
                        <a href="#"><img src="../images/mobile.png" alt="admin-image" class="admin-image"></a>
                        <p class="text-center">Nabin Sunar</p>
                  </div>
                  <div class="button text-center">
                        <button><a href="insert_product.php" class="nav-link text-light bg-info p-1 m-2">Insert Products</a></button>
                        <button><a href="" class="nav-link text-light bg-info p-1 m-2">View Products</a></button>
                        <button><a href="index.php?insert_ptype" class="nav-link text-light bg-info p-1 m-2">Insert
                                    Product Type</a></button>
                        <button><a href="" class="nav-link text-light bg-info p-1 m-2">View Product Type</a></button>
                        <button><a href="index.php?insert_brand" class="nav-link text-light bg-info p-1 m-2">Insert
                                    Brands</a></button>
                        <button><a href="" class="nav-link text-light bg-info p-1 m-2">View Brands</a></button>
                        <button><a href="" class="nav-link text-light bg-info p-1 m-2">All Orders</a></button>
                        <button><a href="" class="nav-link text-light bg-info p-1 m-2">All Payments</a></button>
                        <button><a href="" class="nav-link text-light bg-info p-1 m-2">List Users</a></button>
                        <button><a href="" class="nav-link text-light bg-info p-1 m-2">Logout</a></button>
                  </div>

            </div>
      </div>
      <!-- Fourth Child  -->
      <div class="container my-5">
            <?php
            if (isset($_GET["insert_ptype"])) {
                  include('insert_ptype.php');
            }
            if (isset($_GET["insert_brand"])) {
                  include('insert_brands.php');
            }
            ?>
      </div>
      <!-- last child  -->
      <div class="bg-info p-3 footer">
            <p>All rights are reserved by Nabin Sunar</p>
      </div>
      <!-- bootsrap js cdn -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js
</body>
</html>