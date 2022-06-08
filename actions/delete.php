<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
        <script>
            alert ('Success to Delete Data');
            document.location.href = '../inventory.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert ('Failure to Delete Data');
            document.location.href = '../inventory.php';
        </script>
    ";
}
