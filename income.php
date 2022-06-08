<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'actions/functions.php';
$income = mysqli_query($conn, "SELECT `income` FROM `income-month` ORDER BY id ASC");
$month = mysqli_query($conn, "SELECT `month` FROM `income-month` ORDER BY id ASC");

$incomeOld = mysqli_query($conn, "SELECT `income` FROM `income-year` ORDER BY id ASC");
$monthOld = mysqli_query($conn, "SELECT `month` FROM `income-year` ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootsrap -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <script src="js/bootstrap/bootstrap.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/chart.js"></script>
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
                    <a class="nav-link" href="finished.php">Finished</a>
                    <a class="nav-link active" href="#">Income</a>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navigasi Bar -->

    <!-- Block Graph -->
    <div class="container">
        <h1 class="judul">Pemasukan Bulanan</h1>
        <canvas id="barchart" width="100" height="40"></canvas>
        <p>Total : Rp. 
            <?php 
                $total = "SELECT SUM(income) AS total FROM `income-month`;";
                $result = mysqli_query($conn, $total);
                $fetch = mysqli_fetch_assoc($result);
                echo $fetch["total"];
            ?>
            ,-
        </p>
    </div>

    <!-- Pie Graph -->
    <div class="container">
        <h1 class="judul">Pemasukan Tahun Lalu</h1>
        <canvas id="piechart" width="100" height="40"></canvas>
        <p>Total : Rp. 
            <?php 
                $total = "SELECT SUM(income) AS total FROM `income-year`;";
                $result = mysqli_query($conn, $total);
                $fetch = mysqli_fetch_assoc($result);
                echo $fetch["total"];
            ?>
            ,-
        </p>
    </div>
    <br>
    <br>

    <script  type="text/javascript">
        // Barchart
        var ctx = document.getElementById("barchart").getContext("2d");
        var data = {
                    labels: [<?php while ($p = mysqli_fetch_array($month)) { echo '"' . $p['month'] . '",';}?>],
                    datasets: [
                    {
                    label: "Income",
                    data: [<?php while ($p = mysqli_fetch_array($income)) { echo '"' . $p['income'] . '",';}?>],
                    backgroundColor: [
                        '#df8786',
                        '#de4b5d',
                        '#b71850',
                        '#8e0f3c',
                        '#fcf695',
                        '#fec85e',
                        '#fd922a',
                        '#66dca8',
                        '#3c936c',
                        '#085280',
                        '#35b2e2',
                        '#64cfd9'
                    ]
                    }
                    ]
                    };

        var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                    legend: {
                    display: false
                    },
                    barValueSpacing: 20,
                    scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                    xAxes: [{
                                gridLines: {
                                    color: "rgba(0, 0, 0, 0)",
                                }
                            }]
                    }
                }
                });

        // Piechart
        var ctx = document.getElementById("piechart").getContext("2d");
        var data = {
                    labels: [<?php while ($p = mysqli_fetch_array($monthOld)) { echo '"' . $p['month'] . '",';}?>],
                    datasets: [
                    {
                    label: "Income",
                    data: [<?php while ($p = mysqli_fetch_array($incomeOld)) { echo '"' . $p['income'] . '",';}?>],
                    backgroundColor: [
                        '#df8786',
                        '#de4b5d',
                        '#b71850',
                        '#8e0f3c',
                        '#fcf695',
                        '#fec85e',
                        '#fd922a',
                        '#66dca8',
                        '#3c936c',
                        '#085280',
                        '#35b2e2',
                        '#64cfd9'
                    ]
                    }
                    ]
                    };

        var piechart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: {responsive: true}
                });
    </script>

</body>

</html>