<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/styles/style.css">
  <link rel="shortcut icon" href="./src/images/logo.png" type="image/x-icon">
</head>

<body class="bg-image" style="background-image: url('./src/images/foto.webp')">
  <div class="container-fluid">
    <div class="row justify-content-center align-item-center d-flex">
      <div class="col position-absolute top-50 start-50 translate-middle">
        <form class="form-login mx-auto mt-2.5">
          <h2 class="text-center">Register</h2>
          <hr>
          <div class="mb-3">
            <label for="exampleInputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp"
              placeholder="Username" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputemail" class="form-label">Email Addres</label>
            <input type="email" class="form-control" id="exampleInputEmail" placeholder="example@gmail.com" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Konfirmasi Password"
              required>
          </div>
          <p class="text-center">Sudah Punya Akun? <a href="login.php">Login</a></p>
          <button type="submit" class="btn btn-warning w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>