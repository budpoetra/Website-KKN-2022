<?php
require 'actions/functions.php';

if (isset($_POST["registrasi"])) {

    if (registrasi($_POST) > 0) {
        echo "
            <script>
                alert ('Success to Sign Up!');
                document.location.href = 'login.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert ('Failure to Sign Up!');
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
    <title>Sign Up</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>

    <h1>Sign Up</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td>:</td>
                <td><input type="text" name="username" id="username" require></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" name="password" id="password" require></td>
            </tr>
            <tr>
                <td><label for="password2">Re-Password</label></td>
                <td>:</td>
                <td><input type="password" name="password2" id="password2" require></td>
            </tr>
        </table>
        <button type="submit" name="registrasi">Sign Up!</button>
    </form>

</body>

</html>