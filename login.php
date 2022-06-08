<?php
session_start();
require 'actions/functions.php';

// Cek COOKIE
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // cek id
    $cekId = mysqli_query($conn, "SELECT username FROM account WHERE id = $id");
    $result = mysqli_fetch_assoc($cekId);

    // cek username
    if ($key === hash('sha256', $result["username"])) {
        $_SESSION["login"] = true;
    }
}

// Cek SESSION
if (isset($_SESSION["login"])) {
    header("Location: inventory.php");
    exit;
}

// cek tombol submit
if (isset($_POST["login"])) {
    // Query data
    $username = $_POST["username"];
    $password = $_POST["password"];

    $cekUsername = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");

    // Cek ketersediaan username
    if (mysqli_num_rows($cekUsername) === 1) {
        // Cek password
        $fetch = mysqli_fetch_assoc($cekUsername);
        if (password_verify($password, $fetch["password"])) {
            // Create SESSION
            $_SESSION["login"] = true;

            // Cek COOKIE
            if ($_POST["remember"] === 'on') {
                // Create COOKIE => 1 Jam
                setcookie('id', $fetch["id"], time() + 3600);
                setcookie('key', hash('sha256', $fetch["username"]), time() + 3600);
            }

            header("Location: profile.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootsrap -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <script src="js/bootstrap/bootstrap.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/styleLogin.css">
</head>

<body>

    <div class="container">
        <div class="box">
            <div class="row contentForm">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <center><img src="img/logo.png" alt="Logo" class="img fluid" style="width: 80%;"></center>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h4 class="text-center">Only Admin to Access</h4> 
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <?php if (isset($error)) : ?>
                            <p class="wrongPass">Username / Password Salah</p>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-dark w-100" name="login">Login</button>
                    </form>
                </div>
            </div>
            <div class="container" align="center"><a href="index.html" style="color: black; font-weight:bold;">Back to Beranda</a></div>
        </div>
    </div>

</body>

</html>