<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'actions/functions.php';

$barang = query("SELECT * FROM barang ORDER BY id ASC");
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

    <!-- jQuery -->
    <script src="js/jquery-3.6.0.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/liveSearch.js"></script>
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
                    <a class="nav-link active" href="#">Home</a>
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
        <h1 class="judul">Tabel Barang</h1>

        <!-- Live Seaarch -->
        <form action="" method="POST">
            <div class="input-group mb-4">
                <input type="text" name="keyword" id="search" class="form-control" placeholder="Searching..." autocomplete="off" autofocus>
            </div>
        </form>

        <table class="table table-dark table-striped table-hover">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Costemer</th>
                <th>Deskripsi</th>
                <th>Total</th>
                <th></th>
            </tr>

            <!-- DATA -->
            <?php $i = 1; ?>
            <?php foreach ($barang as $brg) : ?>
                <tr>
                    <td> <?= $i; ?> </td>
                    <td><?= $brg["date"] ?></td>
                    <td><?= $brg["namaCostemer"] ?></td>
                    <td><?= $brg["desc"] ?></td>
                    <td>Rp. <?= number_format($brg["total"], 0, '', '.') ?>,-</td>
                    <td>
                        <a href="actions/finish.php?id=<?= $brg["id"] ?>" onclick="return confirm('Apakah Barang Akan Dikerjakan?');" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16"><path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/><path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/></svg></a>
                        |
                        <a href="actions/delete.php?id=<?= $brg["id"] ?>" onclick="return confirm('Apakah Barang Ini Akan Dihapus?');" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>