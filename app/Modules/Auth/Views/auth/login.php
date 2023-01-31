<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <link rel="stylesheet" href="<?= base_url("modules_assets/dashboard/login/bootstrap.min.css") ?>">


</head>

<body>

  <style>
    .login-container {
      background: url(<?= base_url("uploaded_file/settings/login_image.jpg") ?>);
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
    }

    .login-logo {
      filter: brightness(0) invert(1);
    }
  </style>

  <div class="login-container">

    <div class="row h-100 m-0 p-0">
      <div class="col-lg-4 col-md-8 m-auto">
        <div class="card text-bg-dark">
          <div class="card-header ">
            <div class="d-flex flex-column  align-items-center">
              <img class="img-fluid login-logo" src="<?= base_url("uploaded_file/settings/logo.png") ?>" alt="" srcset="">
              <h3> Login Page</h3>
              <h5>Test Web & Backend Programmer</h5>
            </div>
          </div>
          <div class="card-body">
            <form action="<?= base_url('auth/login') ?>" method="post" accept-charset="utf-8">
              <div class="mb-3">
                <label for="identity" class="form-label">Email address</label>
                <input type="email" class="form-control" id="identity" name="identity">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

<script src="<?= base_url("modules_assets/dashboard/login/bootstrap.min.js") ?>"></script>

</html>