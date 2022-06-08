<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

if (income($id) > 0) {
    echo "
        <script>
            alert ('Success to Check-Out');
            document.location.href = '../finished.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert ('Failure to Check-Out');
            document.location.href = '../finished.php';
        </script>
    ";
}