<?php
require '../actions/functions.php';

$search = $_GET["search"];

$query = "SELECT * FROM barang 
                WHERE 
            namaCostemer LIKE '%$search%'
            ";

$barang = query($query);

?>

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