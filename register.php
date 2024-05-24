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
        <form class="form-login mx-auto mt-2.5" action="register.php" method="post">
          <h2 class="text-center">Register</h2>
          <hr>
          <?php
          if (isset($_POST["submit"]))
          {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["passwordRepeat"];
            $errors = array();

            $passwordhash = password_hash($password, PASSWORD_DEFAULT);

            //Membuat program error
            if (empty($username) OR empty($email) OR empty($password)){
              array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
              array_push($errors, "Email is not valid");
            }
            if (strlen($password) <8 ){
              array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password!==$passwordRepeat){
              array_push($errors, "Password does'nt match");
            }

            //memanggil file connect.php
            require_once "connect.php";

            //mengecek email
            $sql = "SELECT * FROM user where email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0){
              array_push($errors, "email sudah ada");
            }
            
            if ((count($errors)>0)){
              foreach($errors as $error){
                echo "<div class='alert alert-danger'>$error</div>";
              }
            }
            //menyimpan data ke databas
            else{
              $sql = "INSERT INTO user (user, email, pass) VALUES (?,?,?)";
              $stmt = $conn->prepare($sql);
              if ($stmt){
                $stmt->bind_param("sss", $username, $email, $passwordhash);
                $stmt->execute();
                echo "<div class='alert alert-success'>You are Registered</div>";
              }
              else{
                die("Something went wrong");
              }
            }

          }
          
          ?>
          <div class="mb-3">
            <label for="exampleInputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputUsername" aria-describedby="emailHelp"
              placeholder="Username" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputemail" class="form-label">Email Addres</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="example@gmail.com" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="passwordRepeat" id="exampleInputPassword2" placeholder="Konfirmasi Password"
              required>
          </div>
          <p class="text-center">Sudah Punya Akun? <a href="login.php">Login</a></p>
          <button type="submit" name="submit" class="btn btn-warning w-100" value="Register">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>