<?php
$pdo = require_once('koneksi.php');
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$jumlah = str_replace(".", "",$_POST['jumlah']);
$status_kredit = $_POST['status_kredit'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO profile (nama, tanggal, jumlah, status_kredit, alamat)
VALUES (:nama, :tanggal, :jumlah, :status_kredit, :alamat)";
$stmt = $pdo->prepare($sql);
$stmt = $pdo->bind(":nama", $nama);
$stmt = $pdo->bind(":tanggal", date("Y-m-d",strtotime($tanggal)));
$stmt = $pdo->bind(":jumlah", $jumlah);
$stmt = $pdo->bind(":status_kredit", $status_kredit);
$stmt = $pdo->bind(":alamat", $alamat);
$stmt->execute();
echo "Saving is successful";
?>