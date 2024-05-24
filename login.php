<?php
session_start();
if (isset($_SESSION["user"])){
  header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="src/styles/style.css">
  <link rel="shortcut icon" href="src/images/logo.png" type="image/x-icon">
</head>

<body class="bg-image" style="background-image: url('./src/images/foto.webp')">
  <div class="container-fluid">
    <div class="row justify-content-center align-item-center d-flex">
      <div class="col position-absolute top-50 start-50 translate-middle">
        <form class="form-login mx-auto mt-2.5" action="login.php" method="post">
          <img src="src/images/logo.png" alt="" class="img-fluid mx-auto d-block mb-4">
          <hr>
          <?php
          if (isset($_POST["submit"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
  
            require_once "connect.php";
  
            //mengecek akun
            $sql = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user){
              if (password_verify($password, $user["pass"])){
                session_start();
                $_SESSION["user"] = "yes";
                header("Location: index.php");
                die();
              }
              else{
                echo "<div class='alert alert-danger'>Password does'nt match</div>";
              }
            }
            else{
              echo "<div class='alert alert-danger'>Email does'nt match</div>";
            }
          }

          ?>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Email" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>
          <p class="text-center">Belum Punya Akun? <a href="register.php">Register</a></p>
          <button type="submit" class="btn btn-warning w-100" value="Login" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>