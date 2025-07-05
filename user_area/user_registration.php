<?php
include("../includes/connect.php");
include("../functions/common_function.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>User Registration</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
      <div class="container-fluid mt-5">
            <h2 class="text-center">User Registration</h2>
            <div class="row d-flex align-items-center justify-content-center">
                  <div class="col-lg-12 col-xl-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                              <div class="form-outline mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                          placeholder="Enter your username" required>
                              </div>

                              <div class="form-outline mb-3">
                                    <label for="user_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="user_email" name="user_email" required>
                              </div>

                              <div class="form-outline mb-3">
                                    <label for="user_password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="user_password" name="user_password"
                                          required>
                              </div>
                              <div class="form-outline mb-3">
                                    <label for="user_confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="user_confirm_password"
                                          name="user_confirm_password" required>
                              </div>

                              <div class="form-outline mb-3">
                                    <label for="user_image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" id="user_image" name="user_image">
                              </div>

                              <div class="form-outline mb-3">
                                    <label for="user_address" class="form-label">Address</label>
                                    <textarea class="form-control" id="user_address" name="user_address"
                                          rows="2"></textarea>
                              </div>

                              <div class="form-outline mb-3">
                                    <label for="user_mobile" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="user_mobile" name="user_mobile">
                              </div>
                              <div class=" mt-3 mb-4">

                                    <input type="submit" name="user_register"
                                          class="py-2 px-3 text-light border-0 bg-primary" value="Register">
                                    <p class="small my-2">Already have an account? <a href="user_login.php"
                                                class="text-danger  fw-bold"> Login</a></p>
                              </div>
                        </form>
                  </div>
            </div>

      </div>
</body>

</html>


<?php

// Handle form submission
if ($_POST['user_register']) {
      $username = $_POST['username'];
      $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];
      $confirm_password = $_POST['user_confirm_password'];
      $user_address = $_POST['user_address'];
      $user_mobile = $_POST['user_mobile'];
      $user_ip = get_client_ip();


      // check if username already exists
      $check_query = "SELECT * FROM user_details WHERE username = '$username'";
      $check_result = mysqli_query($con, $check_query);

      if (mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('choose different username')</script>";
      } else {
            // Check if passwords match
            if ($user_password !== $confirm_password) {
                  echo "Passwords do not match!";
                  exit();
            }

            // Hash the password
            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

            // Handle image upload
            $image_name = $_FILES['user_image']['name'];
            $image_tmp = $_FILES['user_image']['tmp_name'];

            if (!is_dir('user_images')) {
                  mkdir('user_images');
            }

            move_uploaded_file($image_tmp, "./user_images/$image_name");

            // Insert into database
            $insert_query = "INSERT INTO user_details (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$username', '$user_email', '$hashed_password', '$image_name', '$user_ip', '$user_address', '$user_mobile')";
            $register_result = mysqli_query($con, $insert_query);

            if ($register_result) {
                  echo "<script>alert('User registered successfully!')</script>";
            } else {
                  die(mysqli_error($con));
            }
      }

}
?>