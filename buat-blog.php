<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION["user"];
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $gambar = '';

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
    }

    $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $judul, $konten, $gambar);

    if ($stmt->execute()) {
        echo "<span style='color:white;'>Post berhasil ditambahkan!</span>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Blog Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/style.css">
    <link rel="shortcut icon" href="src/images/logo.png" type="image/x-icon">
    <style>
        ::placeholder {
            color: white;
            opacity: 0.3;
        }

        hr {
            height: 2px;
            background-color: white;
        }

        textarea {
            resize: none;
        }
    </style>
</head>

<body style="background-color: #090A20;">
    <div class="container-fluid pt-5 px-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="text-center custom-input text-white" placeholder="Judul" name="judul">
                <hr>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="btn btn-outline-warning">
                        Tambah Gambar <input type="file" name="gambar" hidden>
                    </label>
                </div>
                <div class="col-6 text-end">
                    <button type="submit" class="btn btn-outline-success">Publish</button>
                    <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-md-6 position-relative">
                    <div class="blog-area border border-secondary p-5">
                        <textarea class="custom-input text-white" placeholder="Mulai menulis!" style="height: 600px;" name="konten"></textarea>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>