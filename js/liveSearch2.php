<?php
require '../actions/functions.php';

$search = $_GET["search"];

$query = "SELECT * FROM finish 
                WHERE 
            namaCostemer LIKE '%$search%'
            ";

$finish = query($query);

?>

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