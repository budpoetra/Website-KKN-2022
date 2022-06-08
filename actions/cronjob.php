<?php

require 'functions.php';

for ($i=1; $i <= 12; $i++) {
    $result = mysqli_query($conn, "SELECT * FROM `income-month` WHERE id = $i");

    if (mysqli_num_rows($result) === 1) {
        $fetch = mysqli_fetch_assoc($result);
        $income = $fetch["income"];

        $insert = "UPDATE `income-year` SET `income` = '$income' WHERE `income-year`.`id` = $i;";
        mysqli_query($conn, $insert);
    }

    $reset = "UPDATE `income-month` SET `income` = '0' WHERE `income-month`.`id` = $i;";
    mysqli_query($conn, $reset);
}

?>