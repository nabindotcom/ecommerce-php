<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>User Registration</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
      <div class="container-fluid mt-5">
            <h2 class="text-center">User Login</h2>
            <div class="row d-flex align-items-center justify-content-center">
                  <div class="col-lg-12 col-xl-6">
                        <form action="" method="POST" enctype="multipart/form-data">

                              <div class="form-outline mb-3">
                                    <label for="user_email" class="form-label">Email / Phone No</label>
                                    <input type="email" class="form-control" id="user_email" name="user_email" required>
                              </div>

                              <div class="form-outline mb-3">
                                    <label for="user_password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="user_password" name="user_password"
                                          required>
                              </div>
                              <div class="form-outline mb-3">
                                    <a href="">Forgot password?</a>
                              </div>
                              <div class=" mt-3 mb-4">
                                    <input type="submit" name="user-register"
                                          class="py-2 px-3 text-light border-0 bg-primary" value="Login">
                                    <p class="small my-2">Don't have an account? <a href="user_registration.php"
                                                class="text-danger  fw-bold"> Register</a></p>
                              </div>
                        </form>
                  </div>
            </div>

      </div>
</body>

</html>