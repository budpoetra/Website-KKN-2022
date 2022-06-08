<?php

$serverName = "localhost";
$databaseName = "inventory";
$username = "root";
$password = "";

// Database connection
$conn = mysqli_connect($serverName, $username, $password, $databaseName);

// Cek koneksi Database
if (!$conn) {
    die("Connection Failed:" . mysqli_connect_errno());
}

function query($query)
{
    // Query data
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function input($data)
{
    global $conn;

    // Pengambilan data 
    $date = $data["date"];
    $namaCostemer = htmlspecialchars($data["namaCostemer"]);
    $desc = htmlspecialchars(($data["desc"]));
    $total = intval(($data["total"]));

    // Query insert data
    $insert = "INSERT INTO barang
                    VALUES
                (NULL, '$date', '$namaCostemer', '$desc', $total)
            ";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function finish($id)
{
    global $conn;

    $result = mysqli_query($conn, "SELECT * FROM barang WHERE id = $id");

    if (mysqli_num_rows($result) === 1) {
        $fetch = mysqli_fetch_assoc($result);
        $namaCostemer = $fetch["namaCostemer"];
        $desc = $fetch["desc"];
        $total = intval($fetch["total"]);

        $insert = "INSERT INTO finish
                    VALUES
                (NULL, '$namaCostemer', '$desc', $total)
            ";
        mysqli_query($conn, $insert);

        $delete = "DELETE FROM barang WHERE id = $id";
        mysqli_query($conn, $delete);

        return mysqli_affected_rows($conn);
    }

}

function delete($id)
{
    global $conn;

    $delete = "DELETE FROM barang WHERE id = $id";
    mysqli_query($conn, $delete);

    return mysqli_affected_rows($conn);
}

function income($id)
{
    global $conn;

    $resultFinish = mysqli_query($conn, "SELECT * FROM finish WHERE id = $id");
    if (mysqli_num_rows($resultFinish) === 1) {
        $fetch = mysqli_fetch_assoc($resultFinish);
        $totalFinish = intval($fetch["total"]);

        // Pengecekan Bulan
        $date = date("m");
        if ($date == '1') {
            $idMonth = 1;
        }
        if ($date == '2') {
            $idMonth = 2;
        }
        if ($date == '3') {
            $idMonth = 4;
        }
        if ($date == '4') {
            $idMonth = 4;
        }
        if ($date == '5') {
            $idMonth = 5;
        }
        if ($date == '6') {
            $idMonth = 6;
        }
        if ($date == '7') {
            $idMonth = 7;
        }
        if ($date == '8') {
            $idMonth = 8;
        }
        if ($date == '9') {
            $idMonth = 9;
        }
        if ($date == '10') {
            $idMonth = 10;
        }
        if ($date == '11') {
            $idMonth = 11;
        }
        if ($date == '12') {
            $idMonth = 12;
        }

        $resultIncome = mysqli_query($conn, "SELECT * FROM `income-month` WHERE id = $idMonth");
        if (mysqli_num_rows($resultIncome) === 1) {
            $fetch = mysqli_fetch_assoc($resultIncome);
            $totalIncome = intval($fetch["income"]);

            $totalNew = $totalFinish + $totalIncome;

            $insert = "UPDATE `income-month`
                    SET
                income = $totalNew
                    WHERE
                id = $idMonth;
            ";
            mysqli_query($conn, $insert);

            $delete = "DELETE FROM finish WHERE id = $id";
            mysqli_query($conn, $delete);

            return mysqli_affected_rows($conn);
        }
    }
}

function changePass($data)
{
    global $conn;

    // Query data
    $id = 1;
    $oldPass = mysqli_real_escape_string($conn, $data["oldPass"]);
    $newPass1 = mysqli_real_escape_string($conn, $data["newPass1"]);
    $newPass2 = mysqli_real_escape_string($conn, $data["newPass2"]);
    
    $cekid = mysqli_query($conn, "SELECT * FROM account WHERE id = '$id'");

    // Cek ketersediaan id
    if (mysqli_num_rows($cekid) === 1) {
        // Cek password
        $fetch = mysqli_fetch_assoc($cekid);
        if (password_verify($oldPass, $fetch["password"])) {

            // Pengecekan password Baru
            if ($newPass1 !== $newPass2) {
                echo "
                    <script>
                        alert ('New Password do not Match');
                    </script>
                ";
                return false;
            }

            // Enkripsi password baru
            $password = password_hash($newPass1, PASSWORD_DEFAULT);

            $query = ("UPDATE `account`
                        SET
                    `password` = '$password'
                        WHERE
                    `id` = $id"
                    );

            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
        }
    }
}

// function registrasi($data)
// {
//     global $conn;

//     // Query data
//     $username = stripslashes($data["username"]);
//     $password = mysqli_real_escape_string($conn, $data["password"]);
//     $password2 = mysqli_real_escape_string($conn, $data["password2"]);

//     // Cek Kesamaan Username
//     $result = mysqli_query($conn, "SELECT username FROM account WHERE username = '$username'");

//     if (mysqli_fetch_assoc($result)) {
//         echo "
//             <script>
//                 alert ('Username is exist');
//             </script>
//         ";
//         return false;
//     }

//     // Pengecekan password
//     if ($password !== $password2) {
//         echo "
//             <script>
//                 alert ('Passwords do not match');
//             </script>
//         ";
//         return false;
//     }

//     // Enkripsi password
//     $password = password_hash($password, PASSWORD_DEFAULT);

//     $query = ("INSERT INTO account
//                 VALUE
//             (NULL, '$username', '$password')
//             ");

//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }