<?php
$pdo = require_once('koneksi.php');
//merubah tipe data untuk memastikan bahwa tipe data 
// adalah integer yang
// diterima dari parameter $_GET
$id = (int) $_GET['id'];
$sql = "DELETE FROM profile WHERE id=$id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
echo 'Delete is Successful';