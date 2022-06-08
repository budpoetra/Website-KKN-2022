<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'actions/functions.php';

$finish = query("SELECT * FROM finish ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finished</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootsrap -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <script src="js/bootstrap/bootstrap.js"></script>

    <!-- jQuery -->
    <script src="js/jquery-3.6.0.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/liveSearch2.js"></script>
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
                    <a class="nav-link" href="input.php">Input</a>
                    <a class="nav-link active" href="#">Finished</a>
                    <a class="nav-link" href="income.php">Income</a>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navigasi Bar -->

    <div class="container">
        <h1 class="judul">Tabel Barang Selesai</h1>

        <!-- Live Seaarch -->
        <form action="" method="POST">
            <div class="input-group mb-4">
                <input type="text" name="keyword" id="search" class="form-control" placeholder="Searching..." autocomplete="off" autofocus>
            </div>
        </form>

        <table class="table table-dark table-striped table-hover">
            <tr>
                <th>Nama Costemer</th>
                <th>Deskripsi</th>
                <th>Total</th>
                <th></th>
            </tr>

            <!-- DATA -->
            <?php foreach ($finish as $barang) : ?>
                <tr>
                    <td><?= $barang["namaCostemer"] ?></td>
                    <td><?= $barang["desc"] ?></td>
                    <td>Rp. <?= number_format($barang["total"], 0, '', '.') ?>,-</td>
                    <td>
                        <a href="actions/in.php?id=<?= $barang["id"] ?>" onclick="return confirm('Check-Out Barang ini?');" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/></svg></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>