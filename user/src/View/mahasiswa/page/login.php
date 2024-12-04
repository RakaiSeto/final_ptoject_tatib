<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <style>
      .login-box {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .login-box img {
        width: 100px;
        margin-bottom: 20px;
      }

      .login-box .btn {
        background-color: #ff6f00;
        border: none;
      }

      .login-box .btn:hover {
        background-color: #df7935;
      }

      .bg-orange {
        background-image: url("../img/loginFrame.png");
      }
    </style>
  </head>
  <body class="vh-100">
    <div class="container-fluid h-100">
      <div class="row h-100">
        <!-- Left Section -->
        <div class="col-lg-5 d-flex flex-column justify-content-center align-items-center bg-light p-4">
          <div class="login-box text-center p-4">
            <img alt="Logo" src="../img/logo.svg" />
            <!-- <h1 class="h4 fw-bold mt-3">E-Tatib</h1> -->
            <h2 class="h5 text-secondary text-sm-start">Login</h2>
            <p class="text-muted">Masukkan Username dan Password Anda</p>
            <form>
              <input class="form-control mb-3" placeholder="Username" type="text" />
              <input class="form-control mb-3" placeholder="Password" type="password" />
              <a href="dashboard.php" class="btn w-100 text-light">Login</a>
              <!-- <button class="btn w-100">Login</button>/ -->
            </form>
          </div>
        </div>

        <!-- Right Section -->
        <div class="col-lg-7 d-none d-lg-flex justify-content-center align-items-center bg-orange p-4">
          <!-- <img class="illustration" alt="img" src="../img/loginFrame.png" /> -->
        </div>
      </div>
    </div>
  </body>
</html>
