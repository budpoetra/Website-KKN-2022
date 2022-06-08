<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'actions/functions.php';

if (isset($_POST["changePass"])) {

    if (changePass($_POST) > 0) {
        echo "
            <script>
                alert ('Success to Change Password!');
                document.location.href = 'profile.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert ('Failure to Change Password!');
                document.location.href = 'profile.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab.Scarpe</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootsrap -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <script src="js/bootstrap/bootstrap.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navigasi Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav bg-dark shadow p-3 fixed-top" data-aos="fade-down" data-aos-duration="1500">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo-white.png" alt="Logo" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="inventory.php">Home</a>
                    <a class="nav-link" href="input.php">Input</a>
                    <a class="nav-link" href="finished.php">Finished</a>
                    <a class="nav-link" href="income.php">Income</a>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navigasi Bar -->

    <div class="container">
        <h1 class="judul">Profil</h1>
        <div class="row">
            <div class="col">
            <img src="img/logo-white.png" alt="Profile" width="80%">
            </div>
            <div class="col">
                <br>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama Menu</th>
                    </tr>

                    <!-- DATA -->
                    <tr>
                        <td>1</td>
                        <td>SC</td>
                        <td>Shoes : Cleaning</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>SPC</td>
                        <td>Shoes : Premium Cleaning</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>SEC</td>
                        <td>Shoes : Expert Cleaning</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>RU</td>
                        <td>Repaint : Unyellowing</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>RBC</td>
                        <td>Repaint : Basic Colour</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>RL</td>
                        <td>Repaint : Leather</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>CR1</td>
                        <td>Costem Repaint : 1 Colour</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>CR2</td>
                        <td>Costem Repaint : 2 Colour</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>CR3</td>
                        <td>Costem Repaint : 3-4 Colour</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>FREE</td>
                        <td>FREE</option>
                    </tr>
                </table>
            </div>
        </div>

        <h5 class="judul">Ganti Password</h5>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="oldPass" class="form-label">Password Lama</label>
                <input type="password" name="oldPass" id="oldPass" class="form-control">
            </div>
            <div class="mb-3">
                <label for="newPass1" class="form-label">Password Baru</label>
                <input type="password" name="newPass1" id="newPass1" class="form-control">
            </div>
            <div class="mb-3">
                <label for="newPass2" class="form-label">Konfirmasi Password</label>
                <input type="password" name="newPass2" id="newPass2" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning w-100" name="changePass">Ganti Password</button>
        </form>
    </div>
    <br><br>
</body>

</html>