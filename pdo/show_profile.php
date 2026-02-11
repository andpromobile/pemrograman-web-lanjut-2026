<?php
$db = require_once('koneksi.php');
require_once('helper.php');
$id = $_GET['id']; //diambil dari url parameter get
$sql = "SELECT * FROM profile where id = $id";
$query = $db->prepare($sql);
$query->execute();
$row = $query->fetch(); //output adalah array
if (!$row) {
echo 'data tidak ditemukan';
return;
}
$profile = (object) $row;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial
scale=1.0">
    <style>
        .row {
            margin: 0 0 20px 10px;
        }
    </style>
    <title>Profile Mahasiswa</title>
</head>

<body>
    <h1> Data Mahasiswa</h1>
    <div class="row">
        <div><b>Nama</b></div>
        <div>
            <?= $profile->nama; ?>
        </div>
    </div>
    <div class="row">
        <div><b>Alamat</b></div>
        <div>
            <?= $profile->alamat; ?>
        </div>
    </div>
    <div class="row">
        <div><b>Jumlah Pembayaran</b></div>
        <div>
            <?= format_rupiah($profile->jumlah); ?>
        </div>
    </div>
    <div class="row">
        <div><b>Jenis</b></div>
        <div>
            <?= ($profile->status_kredit) ? 'Kredit' : 'Tunai'; ?>
        </div>
    </div>
    <div class="row">
        <div style="float:left; margin-right: 20px"><b><a href="http://localhost/php/pdo/form_edit.php?id=<?=
$id; ?>">Edit</a></b></div>
        <div div style="float:left"><b><a href="http://localhost/php/pdo/delete.php?id=<?= $id; ?>" style="color: red">Delete</a></b></div>
    </div>
</body>

</html>