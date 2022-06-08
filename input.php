<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'actions/functions.php';

// Pengecekan tombol submit
if (isset($_POST["submit"])) {
    // Pengecekan input data
    if (input($_POST) > 0) {
        echo "
            <script>
                alert ('Berhasil Meng-input Barang');
                document.location.href = 'inventory.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert ('Gagal Meng-input Barang');
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
    <title>Input</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootsrap -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <script src="js/bootstrap/bootstrap.js"></script>

    <!-- jQuery -->
    <script src="js/jquery-3.6.0.min.js"></script>

    <!-- External Code -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>

    <!-- Navigasi Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav bg-dark shadow p-3 fixed-top" data-aos="fade-down" data-aos-duration="1500">
        <div class="container">
            <a class="navbar-brand" href="profile.php">
                <img src="img/logo-white.png" alt="Logo" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="inventory.php">Home</a>
                    <a class="nav-link active" href="#">Input</a>
                    <a class="nav-link" href="finished.php">Finished</a>
                    <a class="nav-link" href="income.php">Income</a>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navigasi Bar -->

    <div class="container">
        <h1 class="judul">Input Barang Baru</h1>

        <form action="" method="POST">
            <div class="form-group row" id="formInput">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="date" name="date" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d"); ?>" readonly required>
                </div>
                <label for="namaCostemer" class="col-sm-2 col-form-label">Nama Costemer</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namaCostemer" name="namaCostemer" placeholder="Nama Costemer" required autocomplete="off">
                </div>

                <div id="barang">
                    <div class="row g-3 align-items-center">
                        <label for="merkSepatu" class="col-sm-2 col-form-label">Barang</label>
                        <div class="col-auto">
                        <input type="text" class="form-control" id="merkSepatu" name="merkSepatu" placeholder="Merk Sepatu" required autocomplete="off">
                        </div>
                        <div class="col-auto">
                            <div class="col-sm">
                                <select name="menu" id="menu" class="selectpicker form-control" data-live-search="true">
                                    <option selected>~ Menu ~</option>
                                        <option value="SC">Shoes : Cleaning</option>
                                        <option value="SPC">Shoes : Premium Cleaning</option>
                                        <option value="SEC">Shoes : Expert Cleaning</option>
                                        <option value="RU">Repaint : Unyellowing</option>
                                        <option value="RBC">Repaint : Basic Colour</option>
                                        <option value="RL">Repaint : Leather</option>
                                        <option value="CR1">Costem Repaint : 1 Colour</option>
                                        <option value="CR2">Costem Repaint : 2 Colour</option>
                                        <option value="CR3">Costem Repaint : 3-4 Colour</option>
                                        <option value="FREE">FREE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button id="tambahEL" type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg>
                            </button>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <button id="hitung" type="button" class="btn btn-warning">Hitung</button>
        </form>
    </div>

</body>
</html>